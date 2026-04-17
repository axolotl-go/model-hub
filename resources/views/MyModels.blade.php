<x-app-layout>
    <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">My Models</h2>
                <p class="text-zinc-500 mt-1 text-sm">Your purchased 3D assets, ready to download</p>
            </div>
            <a href="{{ route('landing') }}"
                class="flex items-center gap-2 text-xs font-bold border border-zinc-700 hover:border-cyan-500 text-zinc-400 hover:text-cyan-400 px-4 py-2 rounded-xl transition-all duration-200 uppercase tracking-widest">
                Browse more
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>

        @if($thread->isEmpty())
            {{-- Empty state --}}
            <div class="flex flex-col items-center justify-center py-32 text-center">
                <div class="w-20 h-20 rounded-2xl bg-zinc-900 border border-zinc-800 flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">You don't have any model yet</h3>
                <p class="text-zinc-500 text-sm mb-8">Browse the gallery and add assets to get started.</p>
                <a href="{{ route('landing') }}"
                    class="bg-gradient-to-r from-cyan-400 to-cyan-500 text-black px-8 py-3 rounded-xl font-bold text-sm transition-all active:scale-95">
                    Browse Assets
                </a>
            </div>
        @else
            {{-- Grid 4 columnas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5">
                @foreach($thread ?? [] as $threed)
                    <div
                        class="group bg-zinc-900 rounded-xl overflow-hidden border border-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-0.5">
                        <div class="aspect-video relative overflow-hidden bg-zinc-800">

                            <x-three-d-view :model="$threed" />

                            @if($threed->tags)
                                <div
                                    class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-cyan-400 border border-white/5">
                                    {{ $threed->tags }}
                                </div>
                            @endif
                            {{-- Owned badge --}}
                            <div class="absolute bottom-3 left-3 flex items-center gap-1">
                                <span class="text-[9px] text-emerald-400 font-bold uppercase tracking-wider">Owned</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3
                                class="text-sm font-bold text-white group-hover:text-cyan-400 transition-colors leading-snug mb-1 truncate">
                                {{ $threed->name }}
                            </h3>
                            <p class="text-[9px] text-zinc-600 uppercase tracking-wider mb-3">
                                Purchased {{ $threed->purchase_date ?? '' }}
                            </p>
                            <div class="flex items-center gap-3 mb-3 text-zinc-500">
                                <span class="text-[10px] flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    {{ strtoupper(pathinfo($threed->file_path, PATHINFO_EXTENSION)) }}
                                </span>
                            </div>
                            <a href="{{ $threed->file_path ? asset('storage/' . $threed->file_path) : '#' }}"
                                @if($threed->file_path) download @endif
                                class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black py-2 rounded-lg font-bold text-xs flex items-center justify-center gap-1.5 transition-all active:scale-95 shadow-lg shadow-cyan-500/10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>