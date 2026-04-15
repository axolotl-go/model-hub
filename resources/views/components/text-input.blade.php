@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-zinc-900 border border-zinc-800 text-white rounded-xl focus:border-[#00D9FF] focus:ring focus:ring-[#00D9FF]/30 shadow-sm transition-all text-sm w-full']) }}>