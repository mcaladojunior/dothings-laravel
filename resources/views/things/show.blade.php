@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
            </div>
            <div class="card">
                <div class="card-header">Thing descriptions</div>
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
                        <li>{{ $thing->urgency }}</li>
                        <li>{{ $thing->user->name }}</li>
                        <li>{{ $thing->steps }}</li>
                        <li>
                            <a href="{{ route('things.edit', $thing) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" action="{{ route('things.destroy', $thing) }}">
                              @csrf

                              @method('DELETE')

                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
