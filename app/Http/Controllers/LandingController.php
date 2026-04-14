<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threed;
use App\Models\Category;

class LandingController extends Controller
{
    public function AllCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function kineticGallery()
    {
        $Browse = 'text-cyan-400 border-b-2 border-violet-500 pb-1';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-zinc-400 hover:text-zinc-100 transition-colors';

        $threeds = Threed::latest()->take(12)->get();
        $categories = $this->AllCategories();
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }

    public function index()
    {
        $Browse = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-zinc-400 hover:text-zinc-100 transition-colors';

        return view('Landing.Landing', compact('Browse', 'Exclusives', 'FreeAssets'));
    }


    public function freeAssets()
    {
        $Browse = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-cyan-400 border-b-2 border-violet-500 pb-1';

        $threeds = Threed::where('price', 0)->latest()->take(12)->get();
        $categories = $this->AllCategories();
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }
}
