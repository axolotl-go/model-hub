<x-app-layout>
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-white">Dashboard</h2>
            <p class="text-zinc-500 mt-1 text-sm">Welcome back, {{ Auth::user()->name }}</p>
        </div>
        <a href="{{ route('landing') }}"
            class="flex items-center gap-2 text-xs font-bold border border-zinc-700 hover:border-cyan-500 text-zinc-400 hover:text-cyan-400 px-4 py-2 rounded-xl transition-all duration-200 uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            Browse New Assets
        </a>
    </div>
    <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
        <div class="max-w-7xl mx-auto space-y-10">

            {{-- ── Stats Strip ── --}}
            <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
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
        </div>
    </div>
</x-app-layout>