@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">All the Lists you own</h3>
        </div>
        <div class="card-body">
            <p class="text-right">
                <a class="btn btn-primary" href="{{ route('lists.create') }}"><i class="fas fa-plus mr-2"></i>New List</a>    
            </p>
            @foreach($lists as $list)
                <list-card-lg id="lcard-{{ $list->id }}" name="{{ $list->name }}" priority="{{ $list->priority }}">
                    @foreach($list->things as $thing)
                        <thing-card name="{{ $thing->name }}" status="status: {{ $thing->status }}" start_at="start at: {{ $thing->start_at }}" end_at="end at: {{ $thing->end_at }}" difficulty="difficulty: {{ $thing->difficulty }}" importance="importance: {{ $thing->importance }}" urgency="urgency: {{ $thing->urgency }}"></thing-card>
                    @endforeach        
                </list-card-lg>
            @endforeach
            <div class="row justify-content-center text-center">
                {{ $lists->links() }}    
            </div>
        </div>
    </div>
@endsection
