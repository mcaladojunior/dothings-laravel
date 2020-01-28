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
        <form method="POST" action="{{ route('lists.update', $list) }}">
            @csrf

            @method('PUT')

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
                <button type="submit" class="btn btn-primary">
                    Send<i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>
