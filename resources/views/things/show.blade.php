@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col8">
            <div class="card">
                <div class="card-header">THINGS</div>
                <div class="card-body">
                    <ul>
                        <li>{{ $thing->id }}</li>
                        <li>{{ $thing->name }}</li>
                        <li>{{ $thing->description }}</li>
                        <li>{{ $thing->status }}</li>
                        <li>{{ $thing->start_at }}</li>
                        <li>{{ $thing->end_at }}</li>
                        <li>{{ $thing->difficulty }}</li>
                        <li>{{ $thing->importance }}</li>
                        <li>{{ $thing->user->name }}</li>
                        <li>{{ $thing->steps }}</li>
                        <li>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
