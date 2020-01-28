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
        <div class="container">
            <form method="POST" action="{{ route('lists.update', $list) }}">
                @csrf

                @method('PUT')

                <input name="list_id" type="hidden" value="{{ $list->id }}">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $list->name }}">
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" cols="20">{{ $list->description }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select name="priority" class="form-control @error('priority') is-invalid @enderror">
                        <option value="0" {{ ($list->priority == 0) ? 'selected' : null }}>Undefined</option>
                        <option value="1" {{ ($list->priority == 1) ? 'selected' : null }}>1</option>
                        <option value="2" {{ ($list->priority == 2) ? 'selected' : null }}>2</option>
                        <option value="3" {{ ($list->priority == 3) ? 'selected' : null }}>3</option>
                        <option value="4" {{ ($list->priority == 4) ? 'selected' : null }}>4</option>
                        <option value="5" {{ ($list->priority == 5) ? 'selected' : null }}>5</option>
                    </select>
                </div>

                <div class="form-group text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-info"><i class="fas fa-arrow-left mx-2"></i>Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Send<i class="fas fa-arrow-right mr-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
