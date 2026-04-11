<?php

namespace App\Http\Controllers;

use App\Models\Threed;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    
    public function index() {
        return view('admin.models');
    }

    public function store(Request $request) {
        $data = $request->validate([
           'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'file' => ['required', 'file', 'mimes:stl,obj,fbx', 'max:10240'],
            'price' => ['required', 'decimal:0,2', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $path = $request->file('file')->store('threeds','public');
        
        $threed = Threed::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'file_path' => $path,
            'price' => $data['price'],
            'category_id' => $data['category_id'],
        ]);

        return $threed;
    }
}
