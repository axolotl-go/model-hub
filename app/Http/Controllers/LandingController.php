<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Threed;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function AllCategories()
    {
        $categories = Category::all();

        return $categories;
    }

    public function kineticGallery(Request $request)
    {
        $Browse = 'text-cyan-400 border-b-2 border-violet-500 pb-1';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-zinc-400 hover:text-zinc-100 transition-colors';

        $query = Threed::with('category')->where('enabled', true)->latest();

        $activeCategory = $request->query('category');
        if ($activeCategory) {
            $query->where('category_id', $activeCategory);
        }

        // Modelo random para el hero
        $featured = Threed::where('enabled', true)
            ->whereNotNull('preview_image')
            ->inRandomOrder()
            ->first()
            ?? Threed::where('enabled', true)->inRandomOrder()->first();

        $threeds = $query->get();
        $categories = $this->AllCategories();

        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets', 'activeCategory', 'featured'));
    }

    public function index()
    {

        $categories = Category::all();
        // 6 modelos aleatorios para la sección Featured
        $featured = Threed::with('category')->where('enabled', true)->inRandomOrder()->first();
        $threeds = Threed::with('category')->where('enabled', true)->latest()->get();

        return view('Landing.Landing', compact('featured', 'categories', 'threeds'));
    }

}
