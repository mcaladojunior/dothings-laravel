<div id="app">
    @include('layouts._navbar')
    <main class="py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                @yield('left-sidebar')
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
                
                @yield('content')
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                @yield('right-sidebar')
            </div>
        </div>
    </main>
    @include('layouts._footer')
</div>
