@php
$userCards = auth()->check() ? auth()->user()->cards()->latest()->get() : collect();
@endphp
<x-app-layout>
    <div class="min-w-screen w-full grid grid-cols-1 lg:grid-cols-12 gap-12 p-4">

        {{-- ── Left column ── --}}
        <div class="lg:col-span-7 space-y-8">
            <header class="space-y-4">
                <a href="{{ route('landing') }}"
                    class="inline-flex items-center gap-2 text-zinc-500 hover:text-cyan-400 transition-colors text-xs uppercase tracking-widest font-semibold group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 group-hover:-translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to Gallery
                </a>

                <h1 class="text-4xl md:text-5xl font-black tracking-tighter leading-none text-white">
                    {{ $threed->name }}
                </h1>
            </header>

            {{-- Product card --}}
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl overflow-hidden group">
                <div class="relative w-full h-96 overflow-hidden">
                        <x-three-d-view :model="$threed" />
                </div>
            </div>

            {{-- Description --}}
            <section class="space-y-4">
                <h3 class="text-xl font-bold text-white">Description</h3>
                <p class="text-zinc-400 leading-relaxed">{{ $threed->description }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $threed->tags ?? '') as $tag)
                    <span
                        class="px-3 py-1 bg-zinc-800 text-cyan-400 text-[9px] font-bold uppercase tracking-widest rounded-full border border-cyan-400/20">
                        {{ trim($tag) }}
                    </span>
                    @endforeach
                </div>
            </section>

            {{-- Comments --}}
            <div class="mt-8">
                <h3 class="text-xl font-bold text-white mb-4">Comments ({{ $threed->comments->count() }})</h3>

                @auth
                <form action="{{ route('comments.store', $threed) }}" method="POST"
                    class="mb-6 bg-zinc-900 p-4 rounded-xl border border-zinc-800/60">
                    @csrf
                    <div class="space-y-3">
                        <textarea name="comment" placeholder="Share your thoughts..."
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-3 text-sm text-white placeholder-zinc-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50"
                            rows="3"></textarea>
                        <button type="submit"
                            class="bg-cyan-500 hover:bg-cyan-600 text-black px-4 py-2 rounded-lg font-bold text-xs transition-all">
                            Post Comment
                        </button>
                    </div>
                </form>
                @endauth

                <div class="space-y-4">
                    @if($threed->comments->count())
                    @foreach($threed->comments as $comment)
                    <div class="bg-zinc-900 border border-zinc-800/60 rounded-lg p-4">
                        <div class="flex items-start justify-between mb-2">
                            <span class="font-bold text-white">{{ $comment->user->name }}</span>
                            <span class="text-[9px] text-zinc-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-zinc-400 text-sm">{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                    @else
                    <p class="text-zinc-500 text-sm">No comments yet. Be the first to comment!</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- ── Right column – Action panel ── --}}
        <div class="lg:col-span-5">
            <div
                class="sticky top-6 bg-zinc-900/80 backdrop-blur-sm border border-zinc-800/60 rounded-2xl p-8 md:p-10 shadow-2xl">

                {{-- Price header --}}
                <div class="mb-8 flex justify-between items-end">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-zinc-500 font-bold">Price</p>
                        @if($threed->price == 0)
                        <p class="text-4xl font-black text-emerald-400 mt-1">FREE</p>
                        @else
                        <p class="text-4xl font-black text-green-400 mt-1">${{ number_format($threed->price, 2) }}</p>
                        @endif
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold">By Artist</p>
                        <p class="text-sm text-white font-bold mt-1">{{ $threed->user->name }}</p>
                    </div>
                </div>

                {{-- CTA buttons --}}
                <div class="space-y-3">
                    @if($isPurchased)
                    <div
                        class="w-full bg-emerald-600 text-white py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                        You own this model
                    </div>
                    @else
                    @auth
                    @if($isInCart)
                    <a href="{{ route('cart') }}"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-black py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all active:scale-95 shadow-lg shadow-cyan-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        In Cart — View Checkout
                    </a>
                    @else
                    {{-- Botón Add to Cart --}}
                    <form action="{{ route('cart.add', $threed) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-zinc-800 hover:bg-zinc-700 text-white py-3 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            Add to Cart
                        </button>
                    </form>

                    {{-- Botón Buy Now --}}
                    @if($threed->price > 0)
                    <button type="button" onclick="document.getElementById('buy-now-modal').classList.remove('hidden')"
                        class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all active:scale-95 shadow-lg shadow-cyan-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Comprar Ahora · ${{ number_format($threed->price, 2) }}
                    </button>
                    @else
                    {{-- Modelo gratuito: checkout directo --}}
                    <form action="{{ route('checkout.single', $threed) }}" method="POST">
                        @csrf
                        <input type="hidden" name="card_id" value="0">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-400 to-emerald-500 hover:from-emerald-300 hover:to-emerald-400 text-black py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all active:scale-95">
                            Obtener Gratis
                        </button>
                    </form>
                    @endif
                    @endif
                    @else
                    <a href="{{ route('login') }}"
                        class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 text-black py-3.5 rounded-xl font-bold text-sm flex items-center justify-center transition-all">
                        Login to Purchase
                    </a>
                    @endauth

                    {{-- Modal Buy Now --}}
                    @auth
                    <div id="buy-now-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">
                        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8 w-full max-w-md shadow-2xl">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-black text-white">Confirmar Compra</h3>
                                <button onclick="document.getElementById('buy-now-modal').classList.add('hidden')"
                                    class="text-zinc-500 hover:text-white transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            {{-- Resumen --}}
                            <div class="flex items-center gap-4 p-4 bg-zinc-800/60 rounded-xl mb-6">
                                <div class="w-12 h-12 rounded-lg bg-zinc-700 overflow-hidden flex-shrink-0">
                                    <img src="{{ $threed->preview_image ? asset('storage/' . $threed->preview_image) : 'https://picsum.photos/seed/' . $threed->id . '/100/100' }}"
                                        alt="{{ $threed->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-white truncate">{{ $threed->name }}</p>
                                    <p class="text-xs text-zinc-500">{{ $threed->category->name }}</p>
                                </div>
                                <p class="text-lg font-black text-cyan-400">${{ number_format($threed->price, 2) }}</p>
                            </div>

                            @if($userCards->count())
                            <form action="{{ route('checkout.single', $threed) }}" method="POST">
                                @csrf
                                <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest mb-3">Selecciona tu tarjeta</p>
                                <div class="space-y-2 mb-6">
                                    @foreach($userCards as $idx => $card)
                                    <label class="flex items-center gap-3 p-3 bg-zinc-800/60 hover:bg-zinc-800 border border-zinc-700/50 hover:border-cyan-500/40 rounded-xl cursor-pointer transition-all">
                                        <input type="radio" name="card_id" value="{{ $card->id }}"
                                            {{ $idx === 0 ? 'checked' : '' }}
                                            class="accent-cyan-400">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-mono text-white">**** **** **** {{ $card->card_number }}</p>
                                            <p class="text-[10px] text-zinc-500">{{ strtoupper($card->card_brand) }} · {{ $card->expiry }}</p>
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                                <button type="submit"
                                    class="w-full py-3.5 bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black font-bold text-sm rounded-xl transition-all active:scale-95 shadow-lg shadow-cyan-500/20">
                                    Confirmar · ${{ number_format($threed->price, 2) }}
                                </button>
                            </form>
                            @else
                            <div class="text-center py-4">
                                <p class="text-zinc-500 text-sm mb-4">No tienes tarjetas guardadas.</p>
                                <a href="{{ route('cards.index') }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-cyan-500 hover:bg-cyan-400 text-black font-bold text-sm rounded-xl transition-all">
                                    Agregar Tarjeta
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endauth
                    @endif
                </div>

                {{-- Info --}}
                <div class="mt-8 pt-8 border-t border-zinc-800/60 space-y-3 text-sm text-zinc-400">
                    <div class="flex justify-between">
                        <span>Category:</span>
                        <span class="text-white font-bold">{{ $threed->category->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Created:</span>
                        <span class="text-white font-bold">{{ $threed->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>