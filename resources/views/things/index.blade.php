@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col8">
            <div class="card">
                <div class="card-header">THINGS</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>#</td>
                              <td>Name</td>
                              <td>Description</td>
                              <td>Status</td>
                              <td>Start at</td>
                              <td>End at</td>
                              <td>Difficulty</td>
                              <td>Importance</td>
                              <td>User Name</td>
                              <td>Steps</td>
                              <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($things as $thing)
                            <tr>
                                <td>{{ $thing->id }}</td>
                                <td>{{ $thing->name }}</td>
                                <td>{{ $thing->description }}</td>
                                <td>{{ $thing->status }}</td>
                                <td>{{ $thing->start_at }}</td>
                                <td>{{ $thing->end_at }}</td>
                                <td>{{ $thing->difficulty }}</td>
                                <td>{{ $thing->importance }}</td>
                                <td>{{ $thing->user->name }}</td>
                                <td>{{ $thing->steps }}</td>
                                <td>
                                    <a href="#">Edit</a>
                                    <a href="#">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
