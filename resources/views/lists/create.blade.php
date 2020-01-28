@extends('layouts.app')

@section('left-sidebar')
    @auth
        @include('_left_sidebar')
    @endauth
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form method="POST" action="{{ route('lists.store') }}">
                @csrf

                @method('POST')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" cols="20">
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select name="priority" class="form-control @error('priority') is-invalid @enderror">
                        <option value="0">Undefined</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="form-group text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-info"><i class="fas fa-arrow-left mr-2"></i>Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Send
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('right-sidebar')
    @auth
        @include('_right_sidebar')
    @endauth
@endsection
