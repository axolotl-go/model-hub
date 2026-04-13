<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Threed;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $purchasedCount = $user->purchases()->count();
        $totalSpent = $user->purchases()->with('threed')->get()->sum(fn($p) => $p->threed->price);
        $cartCount = $user->cartItems()->count();
        $totalAssets = Threed::count();

        return view('dashboard', compact(
            'purchasedCount',
            'totalSpent',
            'cartCount',
            'totalAssets'
        ));
    }
}
