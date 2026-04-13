<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Threed;
use App\Models\Purchase;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalModels = Threed::count();
        $totalSales = Purchase::count();

        $totalRevenue = Purchase::join('threeds', 'purchases.threed_id', '=', 'threeds.id')
            ->sum('threeds.price');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalModels',
            'totalSales',
            'totalRevenue'
        ));
    }
}