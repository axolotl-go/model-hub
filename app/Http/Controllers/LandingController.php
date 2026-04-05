<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threed;

class LandingController extends Controller
{
    public function index()
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
        return view('welcome', compact('threeds', 'categories'));
    }
}
