@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thing details</h4>
                        <br>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $thing->id }}</li>
                            <li class="list-group-item">{{ $thing->name }}</li>
                            <li class="list-group-item">{{ $thing->description }}</li>
                            <li class="list-group-item">{{ $thing->status }}</li>
                            <li class="list-group-item">{{ $thing->start_at }}</li>
                            <li class="list-group-item">{{ $thing->end_at }}</li>
                            <li class="list-group-item">{{ $thing->difficulty }}</li>
                            <li class="list-group-item">{{ $thing->importance }}</li>
                            <li class="list-group-item">{{ $thing->urgency }}</li>
                            <li class="list-group-item">{{ $thing->user->name }}</li>
                            <li class="list-group-item">{{ $thing->steps }}</li>
                        </ul>
                        <br>
                        <div class="row justify-content-center">
                            <a href="{{ url()->previous() }}" class="btn btn-info mx-2"><i class="fas fa-arrow-left mx-2"></i>Back</a>
                            <a href="{{ route('things.edit', $thing) }}" class="btn btn-warning mx-2">Edit</a>
                            <form method="POST" action="{{ route('things.destroy', $thing) }}">
                              @csrf

                              @method('DELETE')

                              <button type="submit" class="btn btn-danger mx-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
