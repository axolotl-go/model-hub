@extends('layouts.landing')
@section('content')
    @if($threeds->count() == 0)
        <p class="text-zinc-500 text-sm">No models found</p>
    @else
        @foreach($threeds as $model)
            @if($model->enabled)
                <x-card-model :item="$model" class="aspect-square" />
            @endif
        @endforeach
    @endif
@endsection