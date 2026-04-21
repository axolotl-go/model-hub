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

        $query = Threed::latest();

        // Filtrar por categoría si viene el parámetro
        $activeCategory = $request->query('category');
        if ($activeCategory) {
            $query->where('category_id', $activeCategory);
        }

        // Modelo random para el hero (con preview_image preferiblemente)
        $featured = Threed::whereNotNull('preview_image')->inRandomOrder()->first()
            ?? Threed::inRandomOrder()->first();

        $threeds = $query->get();
        $categories = $this->AllCategories();

        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets', 'activeCategory', 'featured'));
    }

    public function index()
    {
        $Browse = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-zinc-400 hover:text-zinc-100 transition-colors';

        // Solo visibles + random
        $featured = Threed::query()
            ->where('enabled', true)
            ->inRandomOrder()
            ->take(6)
            ->get();

        $categories = $this->AllCategories();

        return view('Landing.Landing', compact(
            'Browse',
            'Exclusives',
            'FreeAssets',
            'featured',
            'categories'
        ));
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
