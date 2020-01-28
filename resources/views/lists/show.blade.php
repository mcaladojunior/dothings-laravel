@extends('layouts.app')

@section('left-sidebar')
    @auth
        @include('_left_sidebar')
    @endauth
@endsection

@section('right-sidebar')
    @auth
        @include('_right_sidebar')
    @endauth
@endsection

@section('content')
    <list-card-lg id="lcard-{{ $list->id }}" name="{{ $list->name }}" priority="{{ $list->priority }}" show="true">
        <a class="btn btn-primary" data-toggle="collapse" href="#newThingCollapse" role="button" aria-expanded="false" aria-controls="newThingCollapse">
            <i class="fas fa-plus mr-2"></i>New Thing
        </a>
        <div id="newThingCollapse" class="collapse my-2">
            @include('things._create', $list)
        </div>
        @foreach($list->things as $thing)
            <thing-card name="{{ $thing->name }}" status="status: {{ $thing->status }}" start_at="start at: {{ $thing->start_at }}" end_at="end at: {{ $thing->end_at }}" difficulty="difficulty: {{ $thing->difficulty }}" importance="importance: {{ $thing->importance }}" urgency="urgency: {{ $thing->urgency }}"></thing-card>
        @endforeach
    </list-card-lg>
@endsection
