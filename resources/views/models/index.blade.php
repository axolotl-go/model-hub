<x-app-layout>
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-white">3D Models Gallery</h2>
            <p class="text-zinc-500 mt-1 text-sm">Browse and purchase high-quality 3D assets</p>
        </div>
        <a href="{{ route('cart') }}"
            class="flex items-center gap-2 text-xs font-bold border border-zinc-700 hover:border-cyan-500 text-zinc-400 hover:text-cyan-400 px-4 py-2 rounded-xl transition-all duration-200 uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            View Cart
        </a>
    </div>

    @if($models->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        @foreach($models as $model)
        <div
            class="group bg-zinc-900 rounded-xl overflow-hidden border border-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-0.5">
            <div class="aspect-video relative overflow-hidden bg-zinc-800">
                <x-three-d-view :threed_model="$model" />
                <div
                    class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-cyan-400 border border-white/5">
                    {{ $model->tags ?? 'Model' }}
                </div>
                @if($model->isPurchased)
                <div class="absolute bottom-3 left-3 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-4 text-emerald-400">
                        <path fill-rule="evenodd"
                            d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-[9px] text-emerald-400 font-bold uppercase tracking-wider">Owned</span>
                </div>
                @endif
            </div>
            <div class="p-4">
                <h3 class="text-sm font-bold text-white group-hover:text-cyan-400 transition-colors leading-snug mb-1">
                    {{ $model->name }}
                </h3>
                <p class="text-[9px] text-zinc-600 uppercase tracking-wider mb-3 line-clamp-2">{{ $model->description }}
                </p>
                <div class="flex items-center justify-between mb-3">
                    @if($model->price == 0)
                    <span class="text-emerald-400 font-bold text-sm">Free</span>
                    @else
                    <span class="text-white font-bold text-sm">${{ number_format($model->price, 2) }}</span>
                    @endif
                    <span class="text-[10px] text-zinc-500">by {{ $model->user->name }}</span>
                </div>

                @if($model->isPurchased)
                <a href="{{ route('models.show', $model) }}"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-lg font-bold text-xs flex items-center justify-center gap-1.5 transition-all active:scale-95">
                    View Download
                </a>
                @elseif($model->isInCart)
                <a href="{{ route('cart') }}"
                    class="w-full bg-cyan-500 hover:bg-cyan-600 text-black py-2 rounded-lg font-bold text-xs flex items-center justify-center gap-1.5 transition-all active:scale-95">
                    In Cart - Review
                </a>
                @else
                <form action="{{ route('cart.add', $model) }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black py-2 rounded-lg font-bold text-xs flex items-center justify-center gap-1.5 transition-all active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add to Cart
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $models->links() }}
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-32 text-center">
        <div class="w-20 h-20 rounded-2xl bg-zinc-900 border border-zinc-800 flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-8 text-zinc-600">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 6.375c0 2.278-.788 4.372-2.128 6.003M2.25 6.375c0 2.278.788 4.372 2.128 6.003m14.591 6.375c1.141.492 2.268 1.133 3.364 1.912M5.25 19.875c1.141.492 2.268 1.133 3.364 1.912M9 12.75h.008v.008H9V12.75Zm0 0h7.5v-.008H9v.008Zm0 0v8.25m0-13.5v-8.25" />
            </svg>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">No models found</h3>
        <p class="text-zinc-500 text-sm">Check back soon for new assets</p>
    </div>
    @endif
</x-app-layout>