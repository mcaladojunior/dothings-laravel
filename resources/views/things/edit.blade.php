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
    <form method="POST" action="{{ route('things.update', $thing) }}">
        @csrf

        @method('PUT')

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="thing-name" value="{{ $thing->name }}">
                    {{-- <small class="form-text text-muted">Name or Title of the thing.</small> --}}
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
                        <option value="0" selected="{{ ($thing->status == 0) ? 'selected' : '' }}">Undefined</option>
                        <option value="1" selected="{{ ($thing->status == 1) ? 'selected' : '' }}">To-Do</option>
                        <option value="2" selected="{{ ($thing->status == 2) ? 'selected' : '' }}">Doing</option>
                        <option value="3" selected="{{ ($thing->status == 3) ? 'selected' : '' }}">Done</option>
                        <option value="4" selected="{{ ($thing->status == 4) ? 'selected' : '' }}">With Problem</option>
                        <option value="5" selected="{{ ($thing->status == 5) ? 'selected' : '' }}">Blocked</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
                        <option value="0" selected="{{ ($thing->difficulty == 0) ? 'selected' : '' }}">Undefined</option>
                        <option value="1" selected="{{ ($thing->difficulty == 1) ? 'selected' : '' }}">Very Easy</option>
                        <option value="2" selected="{{ ($thing->difficulty == 2) ? 'selected' : '' }}">Easy</option>
                        <option value="3" selected="{{ ($thing->difficulty == 3) ? 'selected' : '' }}">Medium</option>
                        <option value="4" selected="{{ ($thing->difficulty == 4) ? 'selected' : '' }}">Hard</option>
                        <option value="5" selected="{{ ($thing->difficulty == 5) ? 'selected' : '' }}">Very Hard</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="importance">Importance</label>
                    <select name="importance" class="form-control @error('importance') is-invalid @enderror" id="thing-importance">
                        <option value="0" selected="{{ ($thing->importance == 0) ? 'selected' : '' }}">Undefined</option>
                        <option value="1" selected="{{ ($thing->importance == 1) ? 'selected' : '' }}">Not important</option>
                        <option value="2" selected="{{ ($thing->importance == 2) ? 'selected' : '' }}">Little important</option>
                        <option value="3" selected="{{ ($thing->importance == 3) ? 'selected' : '' }}">Medium important</option>
                        <option value="4" selected="{{ ($thing->importance == 4) ? 'selected' : '' }}">Important</option>
                        <option value="5" selected="{{ ($thing->importance == 5) ? 'selected' : '' }}">Very important</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="urgency">Urgency</label>
                    <select name="urgency" class="form-control @error('urgency') is-invalid @enderror" id="thing-urgency">
                        <option value="0" selected="{{ ($thing->urgency == 0) ? 'selected' : '' }}">Undefined</option>
                        <option value="1" selected="{{ ($thing->urgency == 1) ? 'selected' : '' }}">Not urgent</option>
                        <option value="2" selected="{{ ($thing->urgency == 2) ? 'selected' : '' }}">Little urgent</option>
                        <option value="3" selected="{{ ($thing->urgency == 3) ? 'selected' : '' }}">Medium urgent</option>
                        <option value="4" selected="{{ ($thing->urgency == 4) ? 'selected' : '' }}">Urgent</option>
                        <option value="5" selected="{{ ($thing->urgency == 5) ? 'selected' : '' }}">Very urgent</option>
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
