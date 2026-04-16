<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function myModels()
    {
        $user = Auth::user();
        $purchases = $user->purchases;

        $thread = $purchases->map(function ($purchase) {
            $threed = $purchase->threed;
            $threed->purchase_date = $purchase->purchased_at->format('M d, Y');

            return $threed;
        });

        return view('MyModels', compact('thread'));
    }
}
