<x-admin-layout>
    <div class="max-w-2xl">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white">Edit Category</h2>
            <a href="{{ route('admin.categories.index') }}"
                class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Categories</a>
        </div>

        <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-8 space-y-6">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-sm font-bold text-white mb-2">Category Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        required>
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-zinc-800/50 rounded-lg p-4">
                    <p class="text-sm text-zinc-400">
                        <strong>Models in this category:</strong> {{ $category->threeds()->count() }}
                    </p>
                    <p class="text-xs text-zinc-500 mt-1">
                        Note: You can still edit the name, but deleting this category will only be possible if it has no
                        models.
                    </p>
                </div>

                <div class="flex gap-4">
                    <button type="submit"
                        class="px-6 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.categories.index') }}"
                        class="px-6 py-2 bg-zinc-800 hover:bg-zinc-700 text-white font-bold rounded-lg transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>