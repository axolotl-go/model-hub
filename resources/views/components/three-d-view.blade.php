<div class="w-full h-full">
    @if($isValid && $modelPath)
    {{-- GLB: visor 3D interactivo --}}
    <model-viewer
        src="{{ asset('storage/' . $modelPath) }}"
        auto-rotate
        camera-controls
        style="width: 100%; height: 100%; min-height: 240px; background: transparent;">
    </model-viewer>
    @elseif($previewImage)
    {{-- Otro formato: mostrar imagen preview --}}
    <img src="{{ asset('storage/' . $previewImage) }}"
        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300"
        alt="Model preview" />
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none"></div>
    @else
    {{-- Sin preview --}}
    <div class="flex flex-col items-center justify-center w-full h-full bg-zinc-800 text-zinc-600 gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
        <span class="text-xs uppercase tracking-widest">Sin vista previa</span>
    </div>
    @endif
</div>