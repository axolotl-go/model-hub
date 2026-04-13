<?php

namespace App\Http\Controllers;

use App\Models\Threed;
use App\Models\Category;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        $models = Threed::with('category', 'user')->paginate(15);
        return view('admin.models', compact('models'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.models-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'file_path' => ['required', 'file', 'mimes:stl,obj,fbx,gltf,glb', 'max:102400'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['nullable', 'string'],
            'preview_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        
        $filePath = $request->file('file_path')->storeAs(
            'threeds',
            uniqid() . '.' . $request->file('file_path')->extension(),
            'public'
        );

        $previewImage = null;
        if ($request->hasFile('preview_image')) {
            $previewImage = $request->file('preview_image')->store('previews', 'public');
        }

        Threed::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'file_path' => $filePath,
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'tags' => $validated['tags'] ?? null,
            'preview_image' => $previewImage,
            'user_id' => auth()->id,
        ]);

        return redirect()->route('admin.models.index')->with('success', 'Model created successfully');
    }

    public function edit(Threed $model)
    {
        $categories = Category::all();
        return view('admin.models-edit', ['model' => $model, 'categories' => $categories]);
    }

    public function update(Request $request, Threed $model)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'preview_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'file_path' => ['nullable', 'file', 'mimes:stl,obj,fbx,gltf,glb', 'max:102400'],
        ]);

        $model->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'tags' => $validated['tags'] ?? $model->tags,
        ]);

        if ($request->hasFile('preview_image')) {
            $model->preview_image = $request->file('preview_image')->store('previews', 'public');
            $model->save();
        }

        if ($request->hasFile('file_path')) {
            $model->file_path = $request->file('file_path')->store('threeds', 'public');
            $model->save();
        }

        return redirect()->route('admin.models.index')->with('success', 'Model updated successfully');
    }

    public function destroy(Threed $model)
    {
        $model->delete();
        return redirect()->back()->with('success', 'Model deleted successfully');
    }
}
