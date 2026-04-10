<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCartController extends Controller
{
    public function index()
    {
        $cartItems = [
            ['name' => 'Hyper-Core Engine', 'description' => 'A high-quality 3D model of a futuristic engine.', 'tag' => 'PBR', 'color' => 'text-cyan-400', 'price' => 149, 'img' => 'https://picsum.photos/id/10/200/200'],
            ['name' => 'Void Strider v2', 'description' => 'A high-quality 3D model of a futuristic engine.', 'tag' => 'Animated', 'color' => 'text-violet-400', 'price' => 85, 'img' => 'https://picsum.photos/id/20/200/200'],
            ['name' => 'Ethereal Flux 01', 'description' => 'A high-quality 3D model of a futuristic engine.', 'tag' => 'Experimental', 'color' => 'text-pink-400', 'price' => 0, 'img' => 'https://picsum.photos/id/30/200/200'],
        ];
        $subtotal = array_sum(array_column($cartItems, 'price'));
        $discount = 20;
        $total = $subtotal - $discount;

        return view('StoreCart', compact('cartItems', 'subtotal', 'discount', 'total'));
    }

    public function remove(Request $request)
    {
        $cartItems = session('cart', []);
        $cartItems = array_filter($cartItems, fn($item) => $item['id'] !== $request->id);
        session(['cart' => $cartItems]);
        return redirect()->route('cart')->with('success', 'Item removed from cart');
    }

    public function removeAll(Request $request)
    {
        $cartItems = session('cart', []);
        $cartItems = [];
        session(['cart' => $cartItems]);
        return redirect()->route('cart')->with('success', 'All items removed from cart');
    }
}
