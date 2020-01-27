@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">All the Lists you own</h3>
                    <a class="btn btn-primary" href="{{ route('lists.create') }}"><i class="fas fa-plus mx-2"></i>New List</a>
                </div>
                <div class="card-body">
                    @foreach($lists as $list)
                        <things-list name="{{ $list->name }}" priority="{{ $list->priority }}"></things-list>
                    @endforeach
                    <div class="row justify-content-center text-center">
                        {{ $lists->links() }}    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card">
                <div class="card-header" id="thing-header">
                    OPTIONS
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>   
                </div>
            </div>
        </div>
    </div>
@endsection
