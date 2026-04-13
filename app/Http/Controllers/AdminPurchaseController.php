<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class AdminPurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('user', 'threed.category')
            ->orderBy('purchased_at', 'desc')
            ->paginate(15);

        $stats = [
            'total_purchases' => Purchase::count(),
            'total_revenue' => Purchase::join('threeds', 'purchases.threed_id', '=', 'threeds.id')
                ->sum('threeds.price'),
            'recent_purchases' => Purchase::with('user', 'threed')
                ->orderBy('purchased_at', 'desc')
                ->take(5)
                ->get(),
        ];

        return view('admin.purchases', compact('purchases', 'stats'));
    }

    public function show(Purchase $purchase)
    {
        $purchase->load('user', 'threed.category');
        return view('admin.purchases-show', compact('purchase'));
    }
}