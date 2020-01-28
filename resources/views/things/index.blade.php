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
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">All the Things you own</h3>
                    <a class="btn btn-primary" href="{{ route('things.create') }}"><i class="fas fa-plus mx-2"></i>New Thing</a>
                </div>
                <div class="card-body">
                    @foreach($things as $thing)
                        <thing-card name="{{ $thing->name }}" status="status: {{ $thing->status }}" start_at="start at: {{ $thing->start_at }}" end_at="end at: {{ $thing->end_at }}" difficulty="difficulty: {{ $thing->difficulty }}" importance="importance: {{ $thing->importance }}" urgency="urgency: {{ $thing->urgency }}"></thing-card>
                    @endforeach
                    <div class="row justify-content-center text-center">
                        {{ $things->links() }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
