@extends('layouts.app')

@section('left-sidebar')
    @auth
        @include('_left_sidebar')
    @endauth
@endsection

@section('content')
	@guest
		<div class="card">
			<div class="card-header">
				HOME PAGE
			</div>
			<div class="card-body">
				This is the guest user's Home Page!
			</div>
		</div>
	@else
		<p class="text-right">
    		<a class="btn btn-primary" href="{{ route('lists.create') }}">
    			<i class="fas fa-plus mr-2"></i>New List
    		</a>
    	</p>
        <list-card id="lcard-inbox" name="{{ $inbox->name }}" priority="{{ $inbox->priority }}" show="true">
        	<a class="btn btn-primary" data-toggle="collapse" href="#newThingCollapse" role="button" aria-expanded="false" aria-controls="newThingCollapse">
        		<i class="fas fa-plus mr-2"></i>New Thing
        	</a>
            <div id="newThingCollapse" class="collapse my-2">
                @include('things._create', [ 'list' => $inbox ])
            </div>
        	@foreach($inbox->things as $thing)
        		<thing-card name="{{ $thing->name }}" status="status: {{ $thing->status }}" start_at="start at: {{ $thing->start_at }}" end_at="end at: {{ $thing->end_at }}" difficulty="difficulty: {{ $thing->difficulty }}" importance="importance: {{ $thing->importance }}" urgency="urgency: {{ $thing->urgency }}"></thing-card>
        	@endforeach
        </list-card>
	@endguest
@endsection

@section('right-sidebar')
    @auth
	   @include('_right_sidebar')
    @endauth
@endsection
