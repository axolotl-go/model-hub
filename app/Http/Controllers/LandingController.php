<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threed;

class LandingController extends Controller
{

    public function allAssets()
    {
        $threeds = [
            ['title' => 'Hyper-Core Engine', 'id' => 1, 'description' => 'A high-quality 3D model of a futuristic engine.', 'price' => '$149', 'tags' => ['PBR', 'Low Poly']],
            ['title' => 'Void Strider v2', 'id' => 2, 'description' => 'A high-quality 3D model of a futuristic engine.', 'price' => '$85', 'tags' => ['Animated', 'Rigged']],
            ['title' => 'Sub-Level 9 Pack', 'id' => 3, 'description' => 'A high-quality 3D model of a futuristic engine.', 'price' => '$210', 'tags' => ['4K Maps']],
            ['title' => 'Ethereal Flux 01', 'id' => 4, 'description' => 'A high-quality 3D model of a futuristic engine.', 'price' => 'Free', 'tags' => ['Experimental']],
        ];
        $categories = [
            ['name' => 'All Assets'],
            ['name' => 'PBR'],
            ['name' => 'Low Poly'],
            ['name' => 'Animated'],
            ['name' => 'Rigged'],
            ['name' => '4K Maps'],
            ['name' => 'Experimental'],
        ];
        return $threeds;
    }

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

        $threeds = $this->allAssets();
        $categories = $this->AllCategories();
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }

    public function exclusives()
    {
        $Browse = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $Exclusives = 'text-cyan-400 border-b-2 border-violet-500 pb-1';
        $FreeAssets = 'text-zinc-400 hover:text-zinc-100 transition-colors';

        $categories = $this->AllCategories();
        $threeds = collect($this->allAssets())->filter(function ($thread) {

            return $thread['price'] != 'Free';
        });
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }

    public function freeAssets()
    {
        $Browse = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $Exclusives = 'text-zinc-400 hover:text-zinc-100 transition-colors';
        $FreeAssets = 'text-cyan-400 border-b-2 border-violet-500 pb-1';

        $categories = $this->AllCategories();
        $threeds = collect($this->allAssets())->filter(function ($thread) {
            return $thread['price'] == 'Free';
        });
        return view('Landing.welcome', compact('threeds', 'categories', 'Browse', 'Exclusives', 'FreeAssets'));
    }
}
