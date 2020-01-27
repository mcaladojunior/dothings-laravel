@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <things-list id="tlist-{{ $list->id }}" name="{{ $list->name }}" priority="{{ $list->priority }}" show="true">
                <a class="btn btn-primary m-1" data-toggle="collapse" href="#newThingCollapse" role="button" aria-expanded="false" aria-controls="newThingCollapse">
                    <i class="fas fa-plus mx-2"></i>New Thing
                </a>
                <div id="newThingCollapse" class="collapse my-2">
                    @include('things._create', [ 'list' => $list ])
                </div>
                @foreach($list->things as $thing)
                    <thing-card name="{{ $thing->name }}" status="status: {{ $thing->status }}" start_at="start at: {{ $thing->start_at }}" end_at="end at: {{ $thing->end_at }}" difficulty="difficulty: {{ $thing->difficulty }}" importance="importance: {{ $thing->importance }}" urgency="urgency: {{ $thing->urgency }}"></thing-card>
                @endforeach
            </things-list>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            @include('lists._edit', ['list' => $list])
        </div>
    </div>
@endsection
