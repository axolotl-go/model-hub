<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StoreCart;
use App\Models\Threed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreCartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->getCartItems();

        $cartItemsFormatted = $cartItems->map(function ($item) {
            $img = $item->threed->preview_image
                ? asset('storage/' . $item->threed->preview_image)
                : 'https://picsum.photos/seed/' . $item->threed->id . '/200/200';

            return [
                'cart_id'     => $item->id,
                'id'          => $item->threed->id,
                'name'        => $item->threed->name,
                'description' => $item->threed->description,
                'tag'         => $item->threed->tags,
                'color'       => 'text-cyan-400',
                'price'       => $item->threed->price,
                'img'         => $img,
            ];
        })->toArray();

        $subtotal = array_sum(array_column($cartItemsFormatted, 'price'));
        $discount = $subtotal > 0 ? round($subtotal * 0.05, 2) : 0; // 5% discount
        $total    = $subtotal - $discount;

        $cards = $user->cards()->latest()->get();

        return view('StoreCart', [
            'cartItems' => collect($cartItemsFormatted),
            'subtotal'  => $subtotal,
            'discount'  => $discount,
            'total'     => $total,
            'cards'     => $cards,
        ]);
    }

    public function add(Threed $model)
    {
        $user = Auth::user();

        $exists = StoreCart::where('user_id', $user->id)
            ->where('threed_id', $model->id)
            ->exists();

        if (!$exists) {
            StoreCart::create([
                'user_id' => $user->id,
                'threed_id' => $model->id,
            ]);
        }

        return back()->with('success', $model->name . ' added to cart');
    }

    public function remove($cartItemId)
    {
        $user = Auth::user();
        StoreCart::where('id', $cartItemId)
            ->where('user_id', $user->id)
            ->delete();

        return redirect()->route('cart')->with('success', 'Item removed from cart');
    }

    public function removeAll()
    {
        $user = Auth::user();
        StoreCart::where('user_id', $user->id)->delete();
        return redirect()->route('cart')->with('success', 'Cart cleared');
    }
}
