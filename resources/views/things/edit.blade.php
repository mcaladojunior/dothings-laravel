@extends('layouts.app')

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
            <div class="container">
                <form method="POST" action="{{ route('things.update', $thing) }}">
                    @csrf

                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="thing-name" value="{{ $thing->name }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="thing-description" rows="6" cols="30" >
                            {{ $thing->description }}
                        </textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="thing-status">
                            <option value="0" {{ ($thing->status == 0) ? 'selected' : null }}>Undefined</option>
                            <option value="1" {{ ($thing->status == 1) ? 'selected' : null }}>To-Do</option>
                            <option value="2" {{ ($thing->status == 2) ? 'selected' : null }}>Doing</option>
                            <option value="3" {{ ($thing->status == 3) ? 'selected' : null }}>Done</option>
                            <option value="4" {{ ($thing->status == 4) ? 'selected' : null }}>With Problem</option>
                            <option value="5" {{ ($thing->status == 5) ? 'selected' : null }}>Blocked</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_at">Start at:</label>
                        <input name="start_at" type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" id="thing-start_at" value="{{ $thing->start_at->format('Y-m-d\TH:i:s') }}">
                    </div>

                    <div class="form-group">
                        <label for="end_at">End at:</label>
                        <input name="end_at" type="datetime-local" class="form-control @error('end_at') is-invalid @enderror" id="thing-end_at" value="{{ $thing->end_at->format('Y-m-d\TH:i:s') }}">
                    </div>

                    <div class="form-group">
                        <label for="difficulty">Difficulty</label>
                        <select name="difficulty" class="form-control @error('difficulty') is-invalid @enderror" id="thing-difficulty">
                            <option value="0" {{ ($thing->difficulty == 0) ? 'selected' : null }}>Undefined</option>
                            <option value="1" {{ ($thing->difficulty == 1) ? 'selected' : null }}>Very Easy</option>
                            <option value="2" {{ ($thing->difficulty == 2) ? 'selected' : null }}>Easy</option>
                            <option value="3" {{ ($thing->difficulty == 3) ? 'selected' : null }}>Medium</option>
                            <option value="4" {{ ($thing->difficulty == 4) ? 'selected' : null }}>Hard</option>
                            <option value="5" {{ ($thing->difficulty == 5) ? 'selected' : null }}>Very Hard</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="importance">Importance</label>
                        <select name="importance" class="form-control @error('importance') is-invalid @enderror" id="thing-importance">
                            <option value="0" {{ ($thing->importance == 0) ? 'selected' : null }}>Undefined</option>
                            <option value="1" {{ ($thing->importance == 1) ? 'selected' : null }}>Not important</option>
                            <option value="2" {{ ($thing->importance == 2) ? 'selected' : null }}>Little important</option>
                            <option value="3" {{ ($thing->importance == 3) ? 'selected' : null }}>Medium important</option>
                            <option value="4" {{ ($thing->importance == 4) ? 'selected' : null }}>Important</option>
                            <option value="5" {{ ($thing->importance == 5) ? 'selected' : null }}>Very important</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="urgency">Urgency</label>
                        <select name="urgency" class="form-control @error('urgency') is-invalid @enderror" id="thing-urgency">
                            <option value="0" {{ ($thing->urgency == 0) ? 'selected' : null }}>Undefined</option>
                            <option value="1" {{ ($thing->urgency == 1) ? 'selected' : null }}>Not urgent</option>
                            <option value="2" {{ ($thing->urgency == 2) ? 'selected' : null }}>Little urgent</option>
                            <option value="3" {{ ($thing->urgency == 3) ? 'selected' : null }}>Medium urgent</option>
                            <option value="4" {{ ($thing->urgency == 4) ? 'selected' : null }}>Urgent</option>
                            <option value="5" {{ ($thing->urgency == 5) ? 'selected' : null }}>Very urgent</option>
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-info"><i class="fas fa-arrow-left mx-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            Send<i class="fas fa-arrow-right mx-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
