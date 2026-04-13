<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threed;

class LandingController extends Controller
{
    public function AllCategories()
    {
        $categories = [
            ['name' => 'PBR'],
            ['name' => 'Low Poly'],
            ['name' => 'Animated'],
            ['name' => 'Rigged'],
            ['name' => '4K Maps'],
            ['name' => 'Experimental'],
        ];
        return $categories;
    }

    public function index()
    {
        $Browse = 'text-cyan-400 border-b-2 border-violet-500 pb-1';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-zinc-400 hover:text-zinc-100 transition-colors';

        $threeds = Threed::latest()->take(12)->get();
        $categories = $this->AllCategories();
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }


    public function freeAssets()
    {
        $Browse = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-cyan-400 border-b-2 border-violet-500 pb-1';

        $categories = $this->AllCategories();
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }
}
