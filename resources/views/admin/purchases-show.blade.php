<x-admin-layout>
    <div class="max-w-4xl">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white">Purchase Details</h2>
            <a href="{{ route('admin.purchases.index') }}"
                class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Purchases</a>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Purchase Info -->
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6 space-y-4">
                <h3 class="text-lg font-bold text-white">Purchase Information</h3>

                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-zinc-400">Purchase ID</p>
                        <p class="font-medium text-white">#{{ $purchase->id }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-400">Purchase Date</p>
                        <p class="font-medium text-white">{{ $purchase->purchased_at->format('F d, Y \a\t H:i') }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-400">Status</p>
                        <span class="inline-block px-3 py-1 bg-green-500/10 text-green-400 text-xs font-bold rounded">
                            Completed
                        </span>
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6 space-y-4">
                <h3 class="text-lg font-bold text-white">Customer Information</h3>

                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-zinc-400">Name</p>
                        <p class="font-medium text-white">{{ $purchase->user->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-400">Email</p>
                        <p class="font-medium text-white">{{ $purchase->user->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-400">Role</p>
                        <span class="inline-block px-3 py-1 bg-blue-500/10 text-blue-400 text-xs font-bold rounded">
                            {{ ucfirst($purchase->user->role) }}
                        </span>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-400">Member Since</p>
                        <p class="font-medium text-white">{{ $purchase->user->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6 mt-8">
            <h3 class="text-lg font-bold text-white mb-6">Product Details</h3>

            <div class="flex items-start space-x-6">
                <!-- Product Image -->
                <div class="flex-shrink-0">
                    @if($purchase->threed->preview_image)
                        <img src="{{ $purchase->threed->preview_image }}" alt="{{ $purchase->threed->name }}"
                            class="w-32 h-32 object-cover rounded-lg border border-zinc-800">
                    @else
                        <div class="w-32 h-32 bg-zinc-800 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-zinc-400 text-3xl">image</span>
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="flex-1 space-y-3">
                    <div>
                        <h4 class="text-xl font-bold text-white">{{ $purchase->threed->name }}</h4>
                        <p class="text-zinc-400">{{ $purchase->threed->category->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-400">Description</p>
                        <p class="text-white">{{ $purchase->threed->description }}</p>
                    </div>

                    @if($purchase->threed->tags)
                        <div>
                            <p class="text-sm text-zinc-400">Tags</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach(explode(',', $purchase->threed->tags) as $tag)
                                    <span class="px-2 py-1 bg-cyan-500/10 text-cyan-400 text-xs rounded">
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center justify-between pt-4 border-t border-zinc-800">
                        <div>
                            <p class="text-sm text-zinc-400">Price</p>
                            <p class="text-2xl font-bold text-white">${{ number_format($purchase->threed->price, 2) }}
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="text-sm text-zinc-400">Vendor</p>
                            <p class="font-medium text-white">{{ $purchase->threed->user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Download Link -->
        @if($purchase->threed->file_path)
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6 mt-8">
                <h3 class="text-lg font-bold text-white mb-4">Download</h3>
                <p class="text-zinc-400 mb-4">The customer can download this model from their "My Models" page.</p>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('models.show', $purchase->threed) }}"
                        class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                        View Model Page
                    </a>
                    <span class="text-sm text-zinc-500">File: {{ basename($purchase->threed->file_path) }}</span>
                </div>
            </div>
        @endif
    </div>
</x-admin-layout>