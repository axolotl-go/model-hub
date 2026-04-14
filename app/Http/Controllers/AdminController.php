<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Threed;
use App\Models\Purchase;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalModels = Threed::count();
        $totalSales = Purchase::count();

        $totalRevenue = Purchase::join('threeds', 'purchases.threed_id', '=', 'threeds.id')
            ->sum('threeds.price');

        $recentUsers = User::latest()->take(5)->get();

        $recentPurchases = Purchase::with('user', 'threed')
            ->orderBy('purchased_at', 'desc')
            ->take(8)
            ->get();

        $topModels = Threed::withCount('purchases')
            ->orderByDesc('purchases_count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalModels',
            'totalSales',
            'totalRevenue',
            'recentUsers',
            'recentPurchases',
            'topModels'
        ));
    }
}