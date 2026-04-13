<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Purchase::with('user', 'threed')
            ->orderByDesc('purchased_at')
            ->paginate(15);

        $totalRevenue = Purchase::with('threed')->get()->sum(fn($p) => $p->threed->price);
        $totalSales = Purchase::count();

        return view('admin.sales', compact('sales', 'totalRevenue', 'totalSales'));
    }
}
