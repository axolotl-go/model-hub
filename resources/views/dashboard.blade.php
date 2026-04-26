<x-app-layout>
    <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">Dashboard</h2>
                <p class="text-zinc-500 mt-1 text-sm">Welcome back, {{ Auth::user()->name }}</p>
            </div>
            <a href="{{ route('landing') }}"
                class="flex items-center gap-2 text-xs font-bold border border-zinc-700 hover:border-cyan-500 text-zinc-400 hover:text-cyan-400 px-4 py-2 rounded-xl transition-all duration-200 uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                Browse Assets
            </a>
        </div>
        <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
            <div class="max-w-7xl mx-auto space-y-10">

                {{-- ── Stats Strip ── --}}
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
                    <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-cyan-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2.25A2.25 2.25 0 0 1 7.5 5.25v13.5A2.25 2.25 0 0 1 5.25 21H3m0-18v16.5c0 1.243 1.007 2.25 2.25 2.25h13.5A2.25 2.25 0 0 0 21 19.5V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-white leading-none">{{ $purchasedCount }}</p>
                            <p class="text-[10px] text-zinc-500 uppercase tracking-widest mt-1">Models Purchased</p>
                        </div>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-emerald-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 3.071-.879 4.242 0M9.75 11.25c.386 0 .75-.064 1.093-.184m7.020-1.566a18.094 18.094 0 0 0-3.282-.5M15 19.5a18.094 18.094 0 0 0-3.282-.5m0 0c-1.148 0-2.263.099-3.352.287m7.352-.287a18.096 18.096 0 0 1-3.282-.5m0 0H21m0 0v-3.375m0 0a18.097 18.097 0 0 0-3.282-.5m0 0H3m0 3.375v-3.375m0 0a18.096 18.096 0 0 0 3.282.5m0 0H21" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-white leading-none">${{ number_format($totalSpent, 2) }}
                            </p>
                            <p class="text-[10px] text-zinc-500 uppercase tracking-widest mt-1">Total Spent</p>
                        </div>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-violet-500/10 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-violet-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-white leading-none">{{ $cartCount }}</p>
                            <p class="text-[10px] text-zinc-500 uppercase tracking-widest mt-1">Items in Cart</p>
                        </div>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-5 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-pink-500/10 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-pink-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-white leading-none">{{ $totalAssets }}</p>
                            <p class="text-[10px] text-zinc-500 uppercase tracking-widest mt-1">Available Assets</p>
                        </div>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="space-y-4">
                    <h3 class="font-bold text-white text-lg">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ route('landing') }}"
                            class="bg-zinc-900 border border-zinc-800/60 hover:border-cyan-500 rounded-xl p-6 transition-all duration-200 group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg bg-cyan-500/10 flex items-center justify-center group-hover:bg-cyan-500/20 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-cyan-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-white group-hover:text-cyan-400 transition-colors">Browse
                                        Gallery</p>
                                    <p class="text-[12px] text-zinc-500">Discover new 3D models</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('cart') }}"
                            class="bg-zinc-900 border border-zinc-800/60 hover:border-violet-500 rounded-xl p-6 transition-all duration-200 group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg bg-violet-500/10 flex items-center justify-center group-hover:bg-violet-500/20 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-violet-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-white group-hover:text-violet-400 transition-colors">View
                                        Cart
                                    </p>
                                    <p class="text-[12px] text-zinc-500">{{ $cartCount }} items waiting</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('purchases.my-models') }}"
                            class="bg-zinc-900 border border-zinc-800/60 hover:border-emerald-500 rounded-xl p-6 transition-all duration-200 group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg bg-emerald-500/10 flex items-center justify-center group-hover:bg-emerald-500/20 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-emerald-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A9.75 9.75 0 1 1 5.543 6.574" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-white group-hover:text-emerald-400 transition-colors">My
                                        Models
                                    </p>
                                    <p class="text-[12px] text-zinc-500">{{ $purchasedCount }} owned</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>