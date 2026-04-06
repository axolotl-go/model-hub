@extends('layouts.landing')
@section('browse', 'text-cyan-400 border-b-2 border-violet-500 pb-1')
@section('exclusives', 'text-zinc-400 hover:text-zinc-100 transition-colors')
@section('free-assets', 'text-zinc-400 hover:text-zinc-100 transition-colors')
@section('content')
@foreach($threeds as $item)
<div class="group bg-[#1f1f23] rounded-2xl overflow-hidden transition-all duration-300 hover:bg-[#25252a]">
    <div class="aspect-square relative overflow-hidden bg-zinc-900">
        <img alt="Model" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://picsum.photos/seed/{{ $loop->index }}/600/600" />
        <div class="absolute top-4 right-4 h-8 w-8 bg-zinc-950/40 backdrop-blur-md rounded-full flex items-center justify-center text-zinc-400 hover:text-[#8ff5ff] transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
        </div>
    </div>
    <div class="p-5">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h4 class="font-bold text-lg text-zinc-100">{{ $item['title'] }}</h4>
                <p class="text-sm text-zinc-500">by <span class="text-zinc-300">{{ $item['author'] }}</span></p>
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
    </div>
</div>
@endforeach
@endsection