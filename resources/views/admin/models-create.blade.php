<x-admin-layout>
    <div class="max-w-4xl">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white">Upload New 3D Model</h2>
            <a href="{{ route('admin.models.index') }}"
                class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Models</a>
        </div>

        <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-8 space-y-6">
            <form action="{{ route('admin.models.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Left Column -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-white mb-2">Model Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                required>
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-bold text-white mb-2">Category</label>
                            <select id="category_id" name="category_id"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-bold text-white mb-2">Price ($)</label>
                            <input type="number" id="price" name="price" value="{{ old('price', '0') }}" step="0.01"
                                min="0"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                required>
                            @error('price')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tags" class="block text-sm font-bold text-white mb-2">Tags
                                (comma-separated)</label>
                            <input type="text" id="tags" name="tags" value="{{ old('tags') }}"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                placeholder="e.g. high-poly, rigged, animated">
                            @error('tags')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="preview_image" class="block text-sm font-bold text-white mb-2">Preview
                                Image</label>
                            <input type="file" name="preview_image" accept="image/*"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            <p class="text-xs text-zinc-400 mt-1">JPG, PNG. Max 2MB</p>
                            @error('preview_image')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="file_path" class="block text-sm font-bold text-white mb-2">3D Model File</label>
                            <input type="file" name="file_path" accept=".obj,.gltf,.glb,.fbx,.stl"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                required>

                            <p class="text-xs text-zinc-400 mt-1">
                                OBJ, GLTF, GLB, FBX, STL. Max 3MB
                            </p>@error('file_path')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-bold text-white mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <button type="submit"
                        class="px-6 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                        Upload Model
                    </button>
                    <a href="{{ route('admin.models.index') }}"
                        class="px-6 py-2 bg-zinc-800 hover:bg-zinc-700 text-white font-bold rounded-lg transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>