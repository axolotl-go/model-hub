@extends('layouts.landing')
@section('content')
    @foreach($threeds as $item)
        <a href="{{ route('models.show', $item) }}">
            <div class="group bg-black rounded-2xl overflow-hidden transition-all duration-300 hover:bg-[#25252a]">
                <div class="aspect-square relative overflow-hidden bg-zinc-900">
                    <x-three-d-view :model="$item" />
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="font-bold text-lg text-zinc-100">{{ $item->name }}</h4>
                            <p class="text-sm text-zinc-500">{{ $item->description }}</p>
                        </div>

                        <div class="text-right">
                            <p class="text-[10px] text-zinc-500 uppercase">Price</p>
                            <p class="font-bold text-[#8ff5ff]">{{ $item->price }}</p>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        @foreach(explode(',', $item->tags ?? '') as $tag)
                            @if(trim($tag))
                                <span class="text-[10px] px-2 py-1 bg-zinc-800 rounded uppercase text-zinc-400">
                                    {{ trim($tag) }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection