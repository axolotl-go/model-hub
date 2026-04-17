<x-app-layout>
    <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-white">Store Cart</h2>
                <p class="text-zinc-500 mt-1 text-sm">Review your selected 3D assets before checkout.</p>
            </div>
            <a href="{{ route('landing') }}"
                class="flex items-center gap-2 text-xs font-bold text-zinc-400 hover:text-cyan-400 transition-colors uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Continue Shopping
            </a>
        </div>
        <div class="max-w-6xl mx-auto mt-4">
            @if(count($cartItems) === 0)
            {{-- Empty state --}}
            <div class="flex flex-col items-center justify-center py-32 text-center">
                <div class="w-20 h-20 rounded-2xl bg-zinc-900 border border-zinc-800 flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8 text-zinc-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Your cart is empty</h3>
                <p class="text-zinc-500 text-sm mb-8">Browse the gallery and add assets to get started.</p>
                <a href="{{ route('landing') }}"
                    class="bg-gradient-to-r from-cyan-400 to-cyan-500 text-black px-8 py-3 rounded-xl font-bold text-sm transition-all active:scale-95">
                    Browse Assets
                </a>
            </div>
            @else

            <div class="flex flex-col lg:flex-row gap-8 items-start">

                {{-- ── Cart Items ── --}}
                <div class="flex-1 space-y-4">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500">
                            {{ count($cartItems) }} Items in cart
                        </h3>
                        <form action="{{ route('cart.remove-all') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-xs text-red-500 hover:text-red-400 transition-colors font-bold uppercase tracking-widest">
                                Clear All
                            </button>
                        </form>
                    </div>

                    @foreach($cartItems as $item)
                    <div
                        class="group flex items-center gap-5 bg-zinc-900 border border-zinc-800/60 hover:border-zinc-700 rounded-2xl p-4 transition-all duration-200">
                        {{-- Thumbnail --}}
                        <div class="relative w-20 h-20 rounded-xl overflow-hidden bg-zinc-800 shrink-0">
                            <img src="{{ $item['img'] }}"
                                class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span
                                    class="text-[9px] font-bold uppercase tracking-wider {{ $item['color'] }} bg-zinc-800 px-2 py-0.5 rounded-full border border-white/5">
                                    {{ $item['tag'] }}
                                </span>
                            </div>
                            <h4 class="text-sm font-bold text-white truncate">{{ $item['name'] }}</h4>
                            <p class="text-[10px] text-zinc-500 mt-0.5">{{ $item['description'] }}</p>
                        </div>

                        {{-- Price --}}
                        <div class="shrink-0 text-right">
                            @if($item['price'] === 0)
                            <span class="text-emerald-400 font-bold text-sm">Free</span>
                            @else
                            <span class="text-white font-bold text-sm">${{ $item['price'] }}</span>
                            @endif
                        </div>

                        {{-- Remove --}}
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="shrink-0">
                            @csrf
                            <button type="submit"
                                class="w-8 h-8 rounded-lg bg-zinc-800 hover:bg-red-950 hover:text-red-400 text-zinc-500 flex items-center justify-center transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>

                {{-- ── Order Summary ── --}}
                <div
                    class="lg:w-80 xl:w-96 shrink-0 bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6 space-y-6 sticky top-6">
                    <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500">Order Summary</h3>

                    {{-- Line items --}}
                    <div class="space-y-3">
                        @foreach($cartItems as $item)
                        <div class="flex justify-between text-sm">
                            <span class="text-zinc-400 truncate max-w-[60%]">{{ $item['name'] }}</span>
                            <span class="text-zinc-300 font-medium">
                                {{ $item['price'] === 0 ? 'Free' : '$' . $item['price'] }}
                            </span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-zinc-800/60"></div>

                    {{-- Totals --}}
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-zinc-400">
                            <span>Subtotal</span>
                            <span>${{ $subtotal }}</span>
                        </div>
                        <div class="border-t border-zinc-800/60 pt-3 flex justify-between text-white font-bold text-base">
                            <span>Total</span>
                            <span>${{ $total }}</span>
                        </div>
                    </div>

                    {{-- Checkout --}}
                    @if($cards->count())
                        {{-- Mostrar tarjetas para seleccionar --}}
                        <div class="space-y-3">
                            <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Selecciona una tarjeta</p>
                            <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
                                @csrf
                                <div class="space-y-2 mb-4">
                                    @foreach($cards as $index => $card)
                                        <label class="flex items-center gap-3 p-3 bg-zinc-800/60 hover:bg-zinc-800 border border-zinc-700/50 hover:border-cyan-500/40 rounded-xl cursor-pointer transition-all group">
                                            <input type="radio" name="card_id" value="{{ $card->id }}"
                                                   {{ $index === 0 ? 'checked' : '' }}
                                                   class="accent-cyan-400 flex-shrink-0">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs font-mono text-white">**** **** **** {{ $card->card_number }}</p>
                                                <p class="text-[10px] text-zinc-500 mt-0.5">
                                                    {{ strtoupper($card->card_brand) }} · Vence {{ $card->expiry }} · {{ $card->owner_name }}
                                                </p>
                                            </div>
                                            @if($card->is_expired)
                                                <span class="text-[9px] text-red-400 font-bold uppercase">Vencida</span>
                                            @endif
                                        </label>
                                    @endforeach
                                </div>

                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all active:scale-95 shadow-lg shadow-cyan-500/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                    Confirmar Compra · ${{ $total }}
                                </button>
                            </form>
                        </div>
                    @else
                        {{-- Sin tarjetas --}}
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 bg-yellow-500/5 border border-yellow-500/20 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="size-4 text-yellow-400 mt-0.5 flex-shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                                <p class="text-xs text-yellow-400/80">
                                    Necesitas agregar una tarjeta para realizar tu compra.
                                </p>
                            </div>
                            <a href="{{ route('cards.index') }}"
                               class="w-full bg-gradient-to-r from-cyan-400 to-cyan-500 hover:from-cyan-300 hover:to-cyan-400 text-black py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Agregar Tarjeta
                            </a>
                        </div>
                    @endif

                    <p class="text-center text-[10px] text-zinc-600">
                        Pago simulado · Entorno de pruebas
                    </p>
                </div>

            </div>
            @endif

        </div>
    </div>
</x-app-layout>