<x-app-layout>
    <div class="flex-1 overflow-y-auto w-full">
    <div class="max-w-4xl mx-auto px-6 py-10 space-y-10">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Métodos de Pago</h1>
                <p class="text-zinc-500 text-sm mt-1">Administra tus tarjetas guardadas de forma segura.</p>
            </div>
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-2 text-xs text-zinc-500 hover:text-cyan-400 transition-colors uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Volver al Perfil
            </a>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
        <div class="flex items-center gap-3 px-4 py-3 bg-emerald-500/10 border border-emerald-500/30 rounded-xl text-emerald-400 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
            {{ session('success') }}
        </div>
        @endif

        {{-- Saved Cards --}}
        <section class="space-y-4">
            <h2 class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Tarjetas Guardadas</h2>

            @if($cards->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($cards as $card)
                @php
                $brandColors = [
                'visa' => 'from-blue-900 to-blue-700',
                'mastercard' => 'from-zinc-900 to-red-900',
                'amex' => 'from-emerald-900 to-teal-800',
                'other' => 'from-zinc-900 to-zinc-700',
                ];
                $gradient = $brandColors[$card->card_brand] ?? $brandColors['other'];
                @endphp
                <div class="relative bg-gradient-to-br {{ $gradient }} border border-white/10 rounded-2xl p-6 overflow-hidden">
                    {{-- Card chip decoration --}}
                    <div class="absolute top-4 right-4 opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="white" class="size-16">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                    </div>

                    {{-- Brand badge --}}
                    <div class="mb-6">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest
                                    {{ $card->card_brand === 'visa' ? 'bg-blue-500/20 text-blue-300' :
                                       ($card->card_brand === 'mastercard' ? 'bg-red-500/20 text-red-300' :
                                       ($card->card_brand === 'amex' ? 'bg-emerald-500/20 text-emerald-300' : 'bg-zinc-600/40 text-zinc-300')) }}">
                            {{ strtoupper($card->card_brand) }}
                        </span>
                    </div>

                    {{-- Card number --}}
                    <p class="text-white font-mono text-lg font-bold tracking-widest mb-4">
                        **** **** **** {{ $card->card_number }}
                    </p>

                    {{-- Bottom row --}}
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-zinc-400 text-[9px] uppercase tracking-widest mb-0.5">Titular</p>
                            <p class="text-white text-sm font-bold uppercase">{{ $card->owner_name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-zinc-400 text-[9px] uppercase tracking-widest mb-0.5">Vence</p>
                            <p class="text-white text-sm font-bold {{ $card->is_expired ? 'text-red-400' : '' }}">
                                {{ $card->expiry }}
                                @if($card->is_expired)
                                <span class="text-red-400 text-[9px] ml-1">VENCIDA</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Delete button --}}
                    <form action="{{ route('cards.destroy', $card) }}" method="POST"
                        class="mt-4 pt-4 border-t border-white/10"
                        onsubmit="return confirm('¿Eliminar esta tarjeta?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center gap-1.5 text-xs text-red-400 hover:text-red-300 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            Eliminar tarjeta
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            @else
            <div class="flex flex-col items-center justify-center py-16 bg-zinc-900 border border-zinc-800/60 rounded-2xl text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" class="size-12 text-zinc-700 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
                <p class="text-zinc-500 font-medium">No tienes tarjetas guardadas</p>
                <p class="text-zinc-600 text-sm mt-1">Agrega una tarjeta para agilizar tus compras.</p>
            </div>
            @endif
        </section>

        {{-- Add Card Form --}}
        <section class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-8">
            <h2 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-cyan-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Agregar Nueva Tarjeta
            </h2>

            <form action="{{ route('cards.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Security notice --}}
                <div class="flex items-start gap-3 px-4 py-3 bg-cyan-500/5 border border-cyan-500/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 text-cyan-400 mt-0.5 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    <p class="text-xs text-cyan-400/80">
                        Solo guardamos los últimos 4 dígitos de tu tarjeta. Nunca almacenamos el número completo ni el CVV. Las compras son simuladas.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Owner name --}}
                    <div class="md:col-span-2">
                        <label for="owner_name" class="block text-sm font-semibold text-zinc-400 mb-2">
                            Nombre del Titular
                        </label>
                        <input type="text" id="owner_name" name="owner_name"
                            value="{{ old('owner_name', auth()->user()->name) }}"
                            placeholder="Como aparece en la tarjeta"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500/50 transition-colors uppercase">
                        @error('owner_name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Card number --}}
                    <div>
                        <label for="card_number" class="block text-sm font-semibold text-zinc-400 mb-2">
                            Número de Tarjeta
                        </label>
                        <input type="text" id="card_number" name="card_number"
                            placeholder="1234 5678 9012 3456"
                            maxlength="19"
                            inputmode="numeric"
                            autocomplete="cc-number"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white text-sm placeholder-zinc-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500/50 transition-colors font-mono tracking-widest"
                            oninput="formatCardNumber(this)">
                        @error('card_number')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Card brand --}}
                    <div>
                        <label for="card_brand" class="block text-sm font-semibold text-zinc-400 mb-2">
                            Tipo de Tarjeta
                        </label>
                        <select id="card_brand" name="card_brand"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500/50 transition-colors">
                            <option value="visa" {{ old('card_brand') === 'visa' ? 'selected' : '' }}>Visa</option>
                            <option value="mastercard" {{ old('card_brand') === 'mastercard' ? 'selected' : '' }}>Mastercard</option>
                            <option value="amex" {{ old('card_brand') === 'amex' ? 'selected' : '' }}>American Express</option>
                            <option value="other" {{ old('card_brand') === 'other' ? 'selected' : '' }}>Otra</option>
                        </select>
                        @error('card_brand')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Expiry month --}}
                    <div>
                        <label for="exp_month" class="block text-sm font-semibold text-zinc-400 mb-2">
                            Mes de Vencimiento
                        </label>
                        <select id="exp_month" name="exp_month"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500/50 transition-colors">
                            @for($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" {{ old('exp_month') == $m ? 'selected' : '' }}>
                                {{ str_pad($m, 2, '0', STR_PAD_LEFT) }} — {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                                </option>
                                @endfor
                        </select>
                        @error('exp_month')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Expiry year --}}
                    <div>
                        <label for="exp_year" class="block text-sm font-semibold text-zinc-400 mb-2">
                            Año de Vencimiento
                        </label>
                        <select id="exp_year" name="exp_year"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-cyan-500/50 transition-colors">
                            @for($y = date('Y'); $y <= date('Y') + 15; $y++)
                                <option value="{{ $y }}" {{ old('exp_year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                        </select>
                        @error('exp_year')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="flex items-center gap-2 px-6 py-3 bg-cyan-500 hover:bg-cyan-400 text-black font-bold text-sm rounded-xl transition-all active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Guardar Tarjeta
                </button>
            </form>
        </section>
    </div>{{-- max-w-4xl --}}
    </div>{{-- overflow-y-auto --}}

    <script>
        // Formatea el número mientras el usuario escribe: 4 dígitos + espacio
        function formatCardNumber(input) {
            let digits = input.value.replace(/\D/g, '').substring(0, 16);
            // Insertar espacio cada 4 dígitos
            input.value = digits.replace(/(\d{4})(?=\d)/g, '$1 ');
        }

        // Antes de hacer submit, eliminar los espacios para que el servidor reciba solo dígitos
        document.querySelector('form[action="{{ route('cards.store') }}"]')
            .addEventListener('submit', function () {
                const input = document.getElementById('card_number');
                input.value = input.value.replace(/\s/g, '');
            });
    </script>
</x-app-layout>