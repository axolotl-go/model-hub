@extends('layouts.landing')
@section('content')
    @if($threeds->count() == 0)
        <p class="text-zinc-500 text-sm">No models found</p>
    @else
        @foreach($threeds as $model)
            <div class="w-[350px]">
                <x-card-model :item="$model" class="aspect-square" />
            </div>
        @endforeach
    @endif
@endsection