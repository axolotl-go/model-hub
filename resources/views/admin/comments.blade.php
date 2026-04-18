<x-admin-layout>
    <div class="space-y-6">
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">Comments Management</h2>
                <p class="text-zinc-500 font-medium">Manage comments on models</p>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="text-white font-medium text-lg w-full border-b border-zinc-800/60 px-2">Models</div>
        </div>
        <div class="flex flex-col gap-4">
            @if(session('success'))
                <div
                    class="flex items-center gap-3 px-4 py-3 bg-emerald-500/10 border border-emerald-500/30 rounded-lg text-emerald-400 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    {{ session('success') }}
                </div>
            @enderror
            @if($comments->count() > 0)
                @foreach ($models as $model)
                    <div class="overflow-x-full bg-zinc-900 rounded-xl border border-zinc-800/60">
                        <div x-data="{ open: false }">

                            <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3">
                                <div class="h-full w-40 flex items-center gap-4                        ">
                                    <img src="{{ asset('storage/' . $model->preview_image) }}" alt="{{ $model->name }}"
                                        class="w-10 h-10 rounded-lg">
                                    <span class="text-white font-medium">{{ $model->name }}</span>
                                </div>

                                <svg x-show="!open" class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                <svg x-show="open" class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>
                            </button>

                            <div x-show="open" class="overflow-hidden transition-all duration-300">
                                <table class="w-full">
                                    <thead class="border-b border-zinc-800/60">
                                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-500">
                                            <th class="px-6 py-4">Comment</th>
                                            <th class="px-6 py-4">User</th>
                                            <th class="px-6 py-4">Role</th>
                                            <th class="px-6 py-4">Date</th>
                                            <th class="px-6 py-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-zinc-800/40">
                                        @foreach($comments as $comment)
                                                            <tr class="hover:bg-zinc-800/40 transition-colors group">
                                                                <td class="px-6 py-4">
                                                                    <div
                                                                        class="rounded-md bg-zinc-800 border border-zinc-700 flex items-center flex-shrink-0">
                                                                        <span class="text-xs font-bold text-zinc-300 p-2">
                                                                            {{ $comment->comment }}
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="flex items-center gap-3">
                                                                        <div
                                                                            class="rounded-md bg-zinc-800 border border-zinc-700 flex items-center justify-center flex-shrink-0">
                                                                            <span class="text-xs font-bold text-zinc-300 p-2">
                                                                                {{ $comment->user->name }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold
{{ $comment->user->role === 'admin'
                                            ? 'bg-red-500/10 text-red-400 border border-red-500/20'
                                            : 'bg-blue-500/10 text-blue-400 border border-blue-500/20' }}">
                                                                        {{ ucfirst($comment->user->role) }}
                                                                    </span>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <p class="text-sm text-zinc-400">{{ $comment->created_at->format('M d, Y') }}
                                                                    </p>
                                                                    <p class="text-xs text-zinc-600">{{ $comment->created_at->diffForHumans() }}</p>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="flex items-center justify-center">
                                                                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-500/10 hover:bg-red-500/20 text-red-400 text-xs font-medium rounded-lg transition-colors">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                                        class="size-3.5">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                                    </svg>
                                                                                    Delete
                                                                                </button>
                                                                            </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="flex flex-col items-center justify-center py-20 text-zinc-700 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>

                    <p class="text-zinc-500 font-medium">No comments yet</p>
                    <p class="text-zinc-600 text-sm mt-1">Comments will appear here once users make comments</p>
                </div>
            @endif
        </div>
</x-admin-layout>