<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\StoreCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $cartItems = StoreCart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Cart is empty');
        }

        // Create purchases for each item
        foreach ($cartItems as $item) {
            Purchase::create([
                'user_id' => $user->id,
                'threed_id' => $item->threed_id,
                'purchased_at' => now(),
            ]);
        }

        // Clear cart
        StoreCart::where('user_id', $user->id)->delete();

        return redirect()->route('purchases.my-models')->with('success', 'Purchase successful! Your models are now available for download.');
    }
}
