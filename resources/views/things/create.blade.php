@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
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
    <form method="POST" action="{{ route('things.store') }}">
        @csrf

        @method('POST')

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="thing-name">
                    {{-- <small class="form-text text-muted">Name or Title of the thing.</small> --}}
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="thing-description" rows="6" cols="30">
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="thing-status">
                        <option value="0">Undefined</option>
                        <option value="1">To-Do</option>
                        <option value="2">Doing</option>
                        <option value="3">Done</option>
                        <option value="4">With Problem</option>
                        <option value="5">Blocked</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="start_at">Start at:</label>
                    <input name="start_at" type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" id="thing-start_at">
                </div>

                <div class="form-group">
                    <label for="end_at">End at:</label>
                    <input name="end_at" type="datetime-local" class="form-control @error('end_at') is-invalid @enderror" id="thing-end_at">
                </div>

                <div class="form-group">
                    <label for="difficulty">Difficulty</label>
                    <select name="difficulty" class="form-control @error('difficulty') is-invalid @enderror" id="thing-difficulty">
                        <option value="0">Undefined</option>
                        <option value="1">Very Easy</option>
                        <option value="2">Easy</option>
                        <option value="3">Medium</option>
                        <option value="4">Hard</option>
                        <option value="5">Very Hard</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="importance">Importance</label>
                    <select name="importance" class="form-control @error('importance') is-invalid @enderror" id="thing-importance">
                        <option value="0">Undefined</option>
                        <option value="1">Not important</option>
                        <option value="2">Little important</option>
                        <option value="3">Medium important</option>
                        <option value="4">Important</option>
                        <option value="5">Very important</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="urgency">Urgency</label>
                    <select name="urgency" class="form-control @error('urgency') is-invalid @enderror" id="thing-urgency">
                        <option value="0">Undefined</option>
                        <option value="1">Not urgent</option>
                        <option value="2">Little urgent</option>
                        <option value="3">Medium urgent</option>
                        <option value="4">Urgent</option>
                        <option value="5">Very urgent</option>
                    </select>
                </div>

                <h3><a href="#">STEPS</a></h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Send
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
