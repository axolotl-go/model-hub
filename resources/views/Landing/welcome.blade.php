@extends('layouts.landing')
@section('content')
@foreach($threeds as $item)
<div class="group bg-[#1f1f23] rounded-2xl overflow-hidden transition-all duration-300 hover:bg-[#25252a]">
    <div class="aspect-square relative overflow-hidden bg-zinc-900">
        <img alt="Model" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://picsum.photos/seed/{{ $loop->index }}/600/600" />
        <div class="absolute top-4 right-4 h-8 w-8 bg-zinc-950/40 backdrop-blur-md rounded-full flex items-center justify-center text-zinc-400 hover:text-[#8ff5ff] transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        </div>
    </div>
    <div class="p-5">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h4 class="font-bold text-lg text-zinc-100">{{ $item['title'] }}</h4>
                <p class="text-sm text-zinc-500">{{ $item['description'] }}</p>
            </div>
            <div class="text-right">
                <p class="text-[10px] text-zinc-500 uppercase">Price</p>
                <p class="font-bold text-[#8ff5ff]">{{ $item['price'] }}</p>
            </div>
        </div>
        <div class="flex gap-2">
            @foreach($item['tags'] as $tag)
            <span class="text-[10px] px-2 py-1 bg-zinc-800 rounded uppercase text-zinc-400">{{ $tag }}</span>
            @endforeach
        </div>
        <a href="{{ route('threed', $item->id)}}">
            <x-primary-button>View Model</x-primary-button>
        </a>
    </div>
</div>
@endforeach
@endsection