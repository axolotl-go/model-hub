<x-app-layout>
    <div class="min-w-screen w-full grid grid-cols-1 lg:grid-cols-12 gap-12">

        {{-- ── Left column ── --}}
        <div class="lg:col-span-7 space-y-8">
            <header class="space-y-4">
                <a href="{{ route('landing') }}"
                    class="inline-flex items-center gap-2 text-zinc-500 hover:text-cyan-400 transition-colors text-xs uppercase tracking-widest font-semibold group">
                    {{-- Arrow left icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 group-hover:-translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to Gallery
                </a>

                <h1 class="text-5xl md:text-7xl font-black tracking-tighter leading-none text-white">
                    Secure <span class="text-cyan-400">Checkout</span>
                </h1>
            </header>

            {{-- Product card --}}
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl overflow-hidden group">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/5 relative h-64 md:h-auto overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaY3I6qrPLA3bhvFb7TIurmue7_6GS1Gw9Nq0Ii-mwIqls8vwE80tI61mrSX0X3Orq9fDg6uGtpZnKs4BtJsBEfc_NTEbtWqUxeBJgbVadPJu11CTVgbnMZ_brC0XHEY8s6miOfYNN18LasEQ0uJMU_WJorKZxkXFW2qMo4pG3mb6kNihtVJzi7svjJAlOkkadtqOAR4VB0r7H20tAlND6QG1L9eLRydaleV7bsv93UL4B8tJLJUahRBRCVNvvIYeiHDne6HQ2qRYN"
                            alt="Cyber Relic"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-zinc-900 to-transparent md:bg-gradient-to-r">
                        </div>
                    </div>

                    <div class="md:w-3/5 p-8 flex flex-col justify-center">
                        <span
                            class="text-cyan-400 text-[10px] uppercase tracking-[0.3em] font-bold">3D Model</span>
                        <h2 class="text-3xl font-bold mt-2 text-white">Cyber-Relic Prototype</h2>
                        <p class="text-zinc-400 mt-4 text-sm font-light leading-relaxed">
                            High-fidelity spatial construct optimized for real-time volumetric rendering.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Comments --}}
            <div class="mt-8">
                <h3 class="text-xl font-bold text-white">Comments</h3>
                <div class="mt-4">
                    @if ($comments->count() == 0)
                    <p class="text-zinc-500">No comments yet.</p>
                    @else
                    @foreach ($comments as $comment)
                    <div class="mb-4">
                        <p class="text-white">{{ $comment->comment }}</p>
                        <p class="text-zinc-500">{{ $comment->user->name }}</p>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        {{-- ── Right column – Payment panel ── --}}
        <div class="lg:col-span-5">
            <div
                class="bg-zinc-900/80 backdrop-blur-sm border border-zinc-800/60 rounded-2xl p-8 md:p-10 shadow-2xl shadow-black/40 relative">

                {{-- Price header --}}
                <div class="mb-10 flex justify-between items-end">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-zinc-500">Total Investment</p>
                        <p class="text-5xl font-black text-cyan-400 mt-1">$499.00</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] text-zinc-500 uppercase tracking-widest">Fee (0.2%)</p>
                        <p class="font-medium text-lg text-white">$0.99</p>
                    </div>
                </div>

                {{-- Payment method --}}
                <div class="space-y-4">
                    <label class="text-xs font-bold tracking-widest uppercase text-zinc-400">Payment Protocol</label>

                    <div class="grid gap-3">
                        {{-- Credit card option --}}
                        <label
                            class="relative flex items-center justify-between p-4 bg-zinc-800/50 rounded-xl border border-zinc-700/50 cursor-pointer hover:bg-zinc-800 transition-all has-[:checked]:border-cyan-500 has-[:checked]:bg-cyan-500/10">
                            <input type="radio" name="pay" class="hidden peer" checked>
                            <div class="flex items-center gap-4">
                                {{-- Credit card icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 text-cyan-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                </svg>
                                <span class="font-medium text-white">Credit Card</span>
                            </div>
                            <div class="flex gap-1 opacity-50">
                                <div class="w-6 h-4 bg-zinc-600 rounded-sm"></div>
                                <div class="w-6 h-4 bg-zinc-500 rounded-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Card form --}}
                <div class="mt-8 space-y-4">
                    <div class="space-y-2">
                        <label class="text-[10px] uppercase tracking-widest text-zinc-500 font-bold">Cardholder Name</label>
                        <input type="text" placeholder="FULL NAME"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500 transition-all placeholder:text-zinc-700 uppercase text-white">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest text-zinc-500 font-bold">Expiration</label>
                            <input type="text" placeholder="MM / YY"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500 transition-all placeholder:text-zinc-700 text-white">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest text-zinc-500 font-bold">CVC</label>
                            <input type="password" placeholder="•••"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500 transition-all placeholder:text-zinc-700 text-white">
                        </div>
                    </div>
                </div>

                {{-- CTA button --}}
                <div class="flex justify-center gap-4 mt-10">
                    <x-primary-button>
                        Purchase
                    </x-primary-button>
                    <x-secondary-button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        Add to Cart
                    </x-secondary-button>
                </div>

                {{-- Legal note --}}
                <p class="mt-6 text-center text-[9px] text-zinc-600 uppercase tracking-widest leading-relaxed">
                    By confirming, you agree to our
                    <a href="#" class="text-cyan-400 hover:underline">License Agreement</a>
                    and the
                    <span class="inline-flex items-center gap-1">Digital Terms
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                    </span>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>