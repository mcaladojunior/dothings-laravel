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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">  
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">All the 'Things' you own</h3>
                    <a href="{{ route('things.create') }}" class="btn btn-primary">New</a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                            <table class="table table-sm table-hover table-striped">
                                <thead>
                                    <tr>
                                      <td scope="col">#</td>
                                      <td scope="col">Name</td>
                                      <td scope="col">Description</td>
                                      <td scope="col">Status</td>
                                      <td scope="col">Start at</td>
                                      <td scope="col">End at</td>
                                      <td scope="col">Difficulty</td>
                                      <td scope="col">Importance</td>
                                      <td scope="col">Urgency</td>
                                      <td scope="col">User Name</td>
                                      <td scope="col">Steps</td>
                                      <td scope="col">Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($things as $thing)
                                    <tr>
                                        <td scope="row">{{ $thing->id }}</td>
                                        <td>{{ $thing->name }}</td>
                                        <td>{{ $thing->description }}</td>
                                        <td>{{ $thing->status }}</td>
                                        <td>{{ $thing->start_at }}</td>
                                        <td>{{ $thing->end_at }}</td>
                                        <td>{{ $thing->difficulty }}</td>
                                        <td>{{ $thing->importance }}</td>
                                        <td>{{ $thing->urgency }}</td>
                                        <td>{{ $thing->user->name }}</td>
                                        <td>{{ $thing->steps }}</td>
                                        <td>
                                            <a href="{{ route('things.show', $thing) }}" class="btn btn-sm btn-info">Show</a>
                                            <a href="{{ route('things.edit', $thing) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form method="POST" action="{{ route('things.destroy', $thing) }}">
                                              @csrf

                                              @method('DELETE')

                                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            {{ $things->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
