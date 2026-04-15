@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-zinc-400 tracking-wide uppercase mb-1']) }}>
    {{ $value ?? $slot }}
</label>
