@extends('layouts.landing')
@section('content')
<<<<<<< HEAD
    @foreach($threeds as $item)
        @if ($item->enabled)
            <a href="{{ route('models.show', $item) }}" class="block">
                <div
                    class="group bg-black w-[250px] rounded-2xl overflow-hidden border border-zinc-800/60 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-black/30">

                    <!-- Preview -->
                    <div class="aspect-square relative overflow-hidden bg-zinc-900">
                        <div class="absolute inset-0 group-hover:scale-105 transition-transform duration-500">
                            <x-three-d-view :model="$item" />
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5 space-y-4">

                        <!-- Header -->
                        <div class="flex justify-between items-start gap-4">
                            <div class="min-w-0">
                                <h4 class="font-bold text-lg text-zinc-100 truncate">
                                    {{ $item->name }}
                                </h4>

                                <p class="text-sm text-zinc-500 line-clamp-2">
                                    {{ $item->description }}
                                </p>
                            </div>

                            <div class="text-right shrink-0">
                                <p class="text-[10px] text-zinc-500 uppercase tracking-wide">
                                    Price
                                </p>

                                <p class="font-bold text-cyan-300 text-sm">
                                    {{ $item->price == 0 ? 'Free' : '$' . number_format($item->price, 2) }}
                                </p>
                            </div>
                        </div>

                        <!-- Tags -->
                        @if($item->tags)
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice(array_filter(array_map('trim', explode(',', $item->tags))), 0, 4) as $tag)
                                    <span
                                        class="text-[10px] px-2 py-1 bg-zinc-800/80 rounded-md uppercase text-zinc-400 border border-zinc-700/50">
                                        {{ $tag }}
                                    </span>
                                @endforeach

                                @if(count(explode(',', $item->tags)) > 4)
                                    <span class="text-[10px] px-2 py-1 bg-zinc-800/50 rounded-md text-zinc-500">
                                        +{{ count(explode(',', $item->tags)) - 4 }}
                                    </span>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>
            </a>
        @endif

    @endforeach
=======
    @if($threeds->count() == 0)
        <p class="text-zinc-500 text-sm">No models found</p>
    @else
        @foreach($threeds as $model)
            <x-card-model :item="$model" class="aspect-square" />
        @endforeach
    @endif
>>>>>>> e83aff7e0b1bacf83ff205ef90c52b4c6cc388e6
@endsection