@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	@guest
		<div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
	    	<div class="card">
	            <div class="card-header">
	            	HOME PAGE
	            </div>
	            <div class="card-body">
	            	This is the guest user's Home Page!
	            </div>
	        </div>
	    </div>
	@else
		<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
        	<p class="text-right">
        		<a class="btn btn-primary" href="{{ route('lists.create') }}">
        			<i class="fas fa-plus mx-2"></i>New List
        		</a>
        	</p>
            <things-list id="tlist-{{ $inbox->id }}" name="{{ $inbox->name }}" priority="{{ $inbox->priority }}" show="true">
            	<a class="btn btn-primary m-1" data-toggle="collapse" href="#newThingCollapse" role="button" aria-expanded="false" aria-controls="newThingCollapse">
            		<i class="fas fa-plus mx-2"></i>New Thing
            	</a>
                <div id="newThingCollapse" class="collapse my-2">
                    @include('things._create', [ 'list' => $inbox ])
                </div>
            	@foreach($inbox->things as $thing)
            		<thing-card name="{{ $thing->name }}" status="status: {{ $thing->status }}" start_at="start at: {{ $thing->start_at }}" end_at="end at: {{ $thing->end_at }}" difficulty="difficulty: {{ $thing->difficulty }}" importance="importance: {{ $thing->importance }}" urgency="urgency: {{ $thing->urgency }}"></thing-card>
            	@endforeach
            </things-list>
	    </div>
	    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
	    	<div class="container">
		        <div class="card">
			        <div class="card-header" id="thing-header">
			        	OPTIONS
			        </div>
			        <div class="card-body">
			        	<ul class="list-group">
							<li class="list-group-item">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Morbi leo risus</li>
							<li class="list-group-item">Porta ac consectetur ac</li>
							<li class="list-group-item">Vestibulum at eros</li>
						</ul>	
			        </div>
			    </div>
			</div>
	    </div>
	@endguest
</div>	
@endsection
