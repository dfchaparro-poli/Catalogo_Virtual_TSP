<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Listar todas las órdenes del cliente.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $orders = $user
            ->orders()          // <— aquí usa $user, no Auth::user()
            ->withCount('items')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Mostrar detalle de una orden específica.
     */
    public function show(Order $order)
    {
        // proteger que solo el dueño vea su orden
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    /**
     * Confirmar compra: convierte carrito en orden.
     */
    public function store()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'El carrito está vacío.');
        }

        // Transacción: crea orden + items + limpia carrito
        DB::transaction(function () use ($user, $cartItems) {
            $total = $cartItems->sum(fn($i) => $i->price * $i->quantity);

            $order = Order::create([
                'user_id'    => $user->id,
                'total'      => $total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->price,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            // Vaciar carrito
            CartItem::where('user_id', $user->id)->delete();
        });

        return redirect()
            ->route('orders.index')
            ->with('success', 'Compra realizada correctamente.');
    }
}
