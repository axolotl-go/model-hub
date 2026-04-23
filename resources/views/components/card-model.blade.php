<div {{ $attributes->merge(['class' => 'group relative bg-black rounded-2xl overflow-hidden transition-all duration-300 hover:bg-[#25252a] w-full h-full']) }}>

    <div class="w-full h-full">
        <a href="{{ route('models.show', $item) }}" class="block w-full h-full">
            <x-three-d-view :model="$item" />
            {{-- Overlay con info --}}
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
            </div>
            <div
                class="absolute bottom-0 left-0 right-0 p-6 translate-y-0 opacity-100 transition-all duration-500 pointer-events-none">
                <p class="text-[10px] text-[#8ff5ff] font-bold uppercase tracking-widest mb-1">
                    {{ $item->category->name ?? 'Model' }}
                </p>
                <h3 class="text-white font-bold text-xl truncate">{{ $item->name }}</h3>
                <p class="text-green-400 text-lg mt-1">
                    {{ $item->price > 0 ? '$' . number_format($item->price, 2) : 'Free' }}
                </p>
                <div class="flex gap-2 mt-2">
                    @foreach(explode(',', $item->tags ?? '') as $tag)
                        @if(trim($tag))
                            <span class="text-[10px] px-2 py-1 bg-zinc-800 rounded uppercase text-zinc-400">
                                {{ trim($tag) }}
                            </span>
                        @endif
                    @endforeach
                </div>
            </div>
        </a>
    </div>
</div>