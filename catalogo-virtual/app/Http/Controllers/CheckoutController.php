<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Muestra el formulario para elegir medio de pago.
     */
    public function show()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Recuperamos la lista de Ítems para mostrar resumen
        $items = $user
                     ->cartItems()
                     ->with('product')
                     ->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')
                             ->with('error','Tu carrito está vacío.');
        }

        // Medios de pago fijos
        $methods = [
            'credit_card'    => 'Tarjeta Crédito',
            'debit_card'     => 'Tarjeta Débito',
            'cash'           => 'Efectivo',
            'bank_transfer'  => 'Transferencia Bancaria',
        ];

        return view('cart.checkout', compact('items','methods'));
    }

    /**
     * Procesa la compra. Si falla, redirige de nuevo al checkout.
     */
    public function process(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $items = $user->cartItems()->with('product')->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error','Carrito vacío.');
        }

        $data = $request->validate([
            'payment_method' => 'required|in:credit_card,debit_card,cash,bank_transfer',
        ]);

        DB::transaction(function() use($items, $data) {
            $user  = Auth::user();
            $total = $items->sum(fn($i)=> $i->price * $i->quantity);

            // 1) Crear orden y guardar método de pago
            $order = Order::create([
                'user_id'        => $user->id,
                'total'          => $total,
                'payment_method' => $data['payment_method'],
            ]);

            // 2) Crear order_items y descontar stock
            foreach ($items as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->price,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            // 3) Vaciar carrito
            CartItem::where('user_id',$user->id)->delete();
        });

        return redirect()
            ->route('orders.index')
            ->with('success','Compra realizada correctamente.');
    }
}
