<x-admin-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-white">Categories Management</h2>
            <a href="{{ route('admin.dashboard') }}"
                class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Dashboard</a>
        </div>

        <div class="flex items-center justify-between">
            <p class="text-zinc-400">Manage 3D model categories</p>
            <a href="{{ route('admin.categories.create') }}"
                class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                + Create Category
            </a>
        </div>

        @if($categories->count())
            <div class="overflow-x-auto bg-zinc-900 rounded-xl border border-zinc-800/60">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-400">
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Models Count</th>
                            <th class="px-6 py-4">Created</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($categories as $category)
                            <tr class="hover:bg-zinc-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white">{{ $category->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-blue-500/10 text-blue-400 text-xs font-bold rounded">
                                        {{ $category->threeds()->count() }} models
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $category->created_at->format('M d, Y') }}</p>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="inline-block px-3 py-1 bg-cyan-500/10 text-cyan-400 text-xs font-bold rounded hover:bg-cyan-500/20 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Are you sure? This will affect {{ $category->threeds()->count() }} models.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500/10 text-red-400 text-xs font-bold rounded hover:bg-red-500/20 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        @else
            <div class="text-center py-12 text-zinc-500">
                <p>No categories found</p>
                <a href="{{ route('admin.categories.create') }}"
                    class="inline-block mt-4 px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                    Create First Category
                </a>
            </div>
        @endif
    </div>
</x-admin-layout>