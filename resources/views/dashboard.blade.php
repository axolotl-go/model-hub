<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-white">My Dashboard</h2>
            <p class="text-zinc-500 mt-1 text-sm">Welcome back, {{ Auth::user()->name }}</p>
        </div>
        <a href="{{ route('landing') }}"
            class="flex items-center gap-2 text-xs font-bold border border-zinc-700 hover:border-cyan-500 text-zinc-400 hover:text-cyan-400 px-4 py-2 rounded-xl transition-all duration-200 uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            Browse Assets
        </a>
    </x-slot>

    <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
        <div class="max-w-7xl mx-auto space-y-10">

            {{-- ── Stats Strip ── --}}
            <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                @php
                $stats = [
                ['label' => 'Models Owned', 'value' => '3', 'icon' => 'M21 7.5l-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9', 'color' => 'text-cyan-400', 'bg' => 'bg-cyan-400/10'],
                ['label' => 'Total Spent', 'value' => '$444', 'icon' => 'M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z', 'color' => 'text-violet-400', 'bg' => 'bg-violet-400/10'],
                ['label' => 'Cart Items', 'value' => '3', 'icon' => 'M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z', 'color' => 'text-pink-400', 'bg' => 'bg-pink-400/10'],
                ['label' => 'Downloads', 'value' => '12', 'icon' => 'M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25', 'color' => 'text-emerald-400','bg' => 'bg-emerald-400/10'],
                ];
                @endphp
                @foreach($stats as $stat)
                <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-5 flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl {{ $stat['bg'] }} flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 {{ $stat['color'] }}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-white leading-none">{{ $stat['value'] }}</p>
                        <p class="text-[10px] text-zinc-500 uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- ── My Models ── --}}
            <section>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-lg font-bold text-white">My Models</h2>
                        <p class="text-xs text-zinc-500 mt-0.5">Your purchased 3D assets, ready to download</p>
                    </div>
                    <a href="{{ route('landing') }}" class="text-[10px] font-bold uppercase tracking-[0.15em] text-zinc-500 hover:text-cyan-400 transition-colors flex items-center gap-1">
                        Browse more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                @php
                $models = [
                ['name' => 'Neon Core X-1', 'date' => 'Jan 12, 2024', 'size' => '42.5 MB', 'format' => 'OBJ, FBX', 'tag' => 'High Poly', 'color' => 'text-cyan-400', 'img' => 'https://picsum.photos/id/1/600/600'],
                ['name' => 'Cyber-Augment v4', 'date' => 'Dec 28, 2023', 'size' => '128.0 MB', 'format' => 'BLEND, GLTF', 'tag' => 'Game Ready', 'color' => 'text-violet-400', 'img' => 'https://picsum.photos/id/2/600/600'],
                ['name' => 'Ethereal Pavilion', 'date' => 'Dec 15, 2023', 'size' => '215.2 MB', 'format' => '3DS, MAX', 'tag' => 'ArchViz', 'color' => 'text-pink-400', 'img' => 'https://picsum.photos/id/3/600/600'],
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                    @foreach($models as $model)
                    <div class="group bg-zinc-900 rounded-xl overflow-hidden border border-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-0.5">
                        <div class="aspect-video relative overflow-hidden bg-zinc-800">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-75 group-hover:opacity-100" src="{{ $model['img'] }}" />
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/70 to-transparent"></div>
                            <div class="absolute top-3 right-3 bg-black/60 backdrop-blur-md px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-widest {{ $model['color'] }} border border-white/5">
                                {{ $model['tag'] }}
                            </div>
                            {{-- Verified badge bottom-left --}}
                            <div class="absolute bottom-3 left-3 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-cyan-400">
                                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-[9px] text-cyan-400 font-bold uppercase tracking-wider">Verified</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-white group-hover:text-cyan-400 transition-colors leading-snug mb-1">{{ $model['name'] }}</h3>
                            <p class="text-[9px] text-zinc-600 uppercase tracking-wider mb-3">Purchased {{ $model['date'] }}</p>
                            <div class="flex items-center gap-3 mb-3 text-zinc-500">
                                <span class="text-[10px] flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 8.485-7.5 11.9-7.5 11.9s-7.5-3.415-7.5-11.9a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    {{ $model['size'] }}
                                </span>
                                <span class="text-[10px] flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    {{ $model['format'] }}
                                </span>
                            </div>
                            <button class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black py-2 rounded-lg font-bold text-xs flex items-center justify-center gap-1.5 transition-all active:scale-95 shadow-lg shadow-cyan-500/10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>