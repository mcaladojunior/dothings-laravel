<div class="card">
    <div class="card-body">
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
                    <form method="POST" action="{{ route('things.storeFromList') }}">
                        @csrf

                        @method('POST')

                        <input id="thing-list-id" name="list_id" type="hidden" value="{{ $list->id }}">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="thing-name">
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                Send<i class="fas fa-arrow-right mx-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>