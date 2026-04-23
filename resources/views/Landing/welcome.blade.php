@extends('layouts.landing')
@section('content')
    @if($threeds->count() == 0)
        <p class="text-zinc-500 text-sm">No models found</p>
    @else
        @foreach($threeds as $model)
            <x-card-model :item="$model" class="aspect-square" />
        @endforeach
    @endif
@endsection