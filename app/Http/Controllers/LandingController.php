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
            ['title' => 'Hyper-Core Engine', 'author' => 'Null_Design', 'price' => '$149', 'tags' => ['PBR', 'Low Poly']],
            ['title' => 'Void Strider v2', 'author' => 'Cosmos_Dev', 'price' => '$85', 'tags' => ['Animated', 'Rigged']],
            ['title' => 'Sub-Level 9 Pack', 'author' => 'Arch-Tek', 'price' => '$210', 'tags' => ['4K Maps']],
            ['title' => 'Ethereal Flux 01', 'author' => 'Prism_Studio', 'price' => 'Free', 'tags' => ['Experimental']],
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
        $threeds = $this->allAssets();
        $categories = $this->AllCategories();
        return view('profile.Landing.welcome', compact('threeds', 'categories'));
    }

    public function exclusives()
    {
        $categories = $this->AllCategories();
        $threeds = collect($this->allAssets())->filter(function ($thread) {
            return $thread['price'] != 'Free';
        });
        return view('profile.Landing.Exclusives', compact('threeds', 'categories'));
    }

    public function freeAssets()
    {
        $categories = $this->AllCategories();
        $threeds = collect($this->allAssets())->filter(function ($thread) {
            return $thread['price'] == 'Free';
        });
        return view('profile.Landing.FreeAssets', compact('threeds', 'categories'));
    }
}
