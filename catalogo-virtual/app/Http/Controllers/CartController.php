<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return view('cart.index', [
            'items' => $user->cartItems()->with('product')->get()
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => "required|integer|min:1|max:{$product->stock}",
        ]);

        $user = Auth::user();

        // Si ya hay un item igual, sumamos cantidades (hasta stock)
        $item = CartItem::firstOrNew([
            'user_id'    => $user->id,
            'product_id' => $product->id,
        ]);
        $newQty = min($item->quantity + $data['quantity'], $product->stock);
        $item->quantity = $newQty;
        $item->price    = $product->price;
        $item->save();

        return back()->with('success', 'Producto agregado al carrito.');
    }

    public function update(Request $request, CartItem $item)
    {
        // Asegurarnos de que el item pertenece al usuario
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => "required|integer|min:1|max:{$item->product->stock}"
        ]);

        $item->quantity = $request->quantity;
        $item->save();

        return back()->with('success', 'Cantidad actualizada.');
    }

    public function remove(CartItem $item)
    {
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        return back()->with('success', 'Producto eliminado del carrito.');
    }
}
