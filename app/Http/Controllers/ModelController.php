<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Threed;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    // Formatos 3D permitidos
    protected array $allowed3DExtensions = ['stl', 'obj', 'fbx', 'gltf', 'glb', 'blend', 'dae'];

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'file_path' => ['required', 'file', 'max:204800'],   // 200 MB máx
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['nullable', 'string'],
            'preview_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        // La regla 'mimes' no reconoce fbx/obj/stl/gltf — validamos la extensión manualmente
        $extension = strtolower($request->file('file_path')->getClientOriginalExtension());

        if (! in_array($extension, $this->allowed3DExtensions)) {
            return back()
                ->withErrors(['file_path' => 'Formato no soportado. Formatos válidos: '.implode(', ', $this->allowed3DExtensions)])
                ->withInput();
        }

        $filePath = $request->file('file_path')->storeAs(
            'threeds',
            uniqid().'.'.$extension,
            'public'
        );

        $previewImage = null;
        if ($request->hasFile('preview_image')) {
            $previewImage = $request->file('preview_image')->store('previews', 'public');
        }

        Threed::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'file_path' => $filePath,
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'tags' => $request->input('tags'),
            'preview_image' => $previewImage,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.models.index')->with('success', 'Model created successfully');
    }

    public function edit(Threed $model)
    {
        $categories = Category::all();

        return view('admin.models-edit', compact('model', 'categories'));
    }

    public function update(Request $request, Threed $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'preview_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'file_path' => ['nullable', 'file', 'max:120000'],
        ]);

        $model->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'tags' => $request->input('tags', $model->tags),
        ]);

        if ($request->hasFile('preview_image')) {
            $model->preview_image = $request->file('preview_image')->store('previews', 'public');
            $model->save();
        }

        if ($request->hasFile('file_path')) {
            // Validar extensión del nuevo archivo 3D
            $extension = strtolower($request->file('file_path')->getClientOriginalExtension());
            if (! in_array($extension, $this->allowed3DExtensions)) {
                return back()
                    ->withErrors(['file_path' => 'Formato no soportado. Formatos válidos: '.implode(', ', $this->allowed3DExtensions)])
                    ->withInput();
            }
            $model->file_path = $request->file('file_path')->storeAs(
                'threeds',
                uniqid().'.'.$extension,
                'public'
            );
            $model->save();
        }

        return redirect()->route('admin.models.index')->with('success', 'Model updated successfully');
    }

    public function destroy(Threed $model)
    {
        $model->delete();

        return redirect()->back()->with('success', 'Model deleted successfully');
    }

    public function enable(Threed $model)
    {
        $model->enabled = true;
        $model->save();

        return redirect()->back()->with('success', 'Model enabled successfully');
    }

    public function disable(Threed $model)
    {
        $model->enabled = false;
        $model->save();

        return redirect()->back()->with('success', 'Model disabled successfully');
    }
}
