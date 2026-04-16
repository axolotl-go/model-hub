<div class="w-full h-full">
    @if($isFbx)
        <div class="three-container w-full h-full" data-model="{{ asset('storage/' . $modelPath) }}"
            style="min-height:240px;">
        </div>
    @else
        <div class="w-full h-full flex flex-col items-center justify-center min-h-[240px] bg-zinc-950 rounded-lg">
            @if($previewImage)
                <img src="{{ asset('storage/' . $previewImage) }}" alt="Vista previa del modelo" class="max-w-full max-h-full object-contain rounded-lg">
            @else
                <div class="text-zinc-500 flex flex-col items-center gap-2">
                    <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm">Vista previa no disponible</span>
                </div>
            @endif
        </div>
    @endif
</div>