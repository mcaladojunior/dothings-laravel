<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/#about">About</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reminders.index') }}">Reminders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('lists.index') }}">Lists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#folders">Folders</a>
                            </li>
                        @endguest
                        <li class="mx-4"></li>
                        <form class="form-inline">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            </div>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#settings"><i class="fas fa-cog"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#notifications"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="mx-2"></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user" data-toggle="tooltip" data-placement="top" title="{{ Auth::user()->name }}"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <ul class="nav nav-pills nav-fill flex-column">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#lists" role="button" aria-expanded="false" aria-controls="lists"><i class="fas fa-list mr-2"></i>Lists</a>
                        </li>
                        @auth
                        <li>
                            <div id="lists" class="collapse show">
                                <ul class="nav nav-pills nav-fill flex-column">
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="{{ route('lists.create') }}">
                                            <i class="fas fa-plus mr-2"></i>New List
                                        </a>
                                    </li>
                                    @foreach(Auth::user()->lists as $list)
                                        <list-card-sm route="{{ route('lists.show', $list) }}" name="{{ $list->name }}" ></list-card-sm>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#folders" role="button" aria-expanded="false" aria-controls="folders">
                                <i class="fas fa-folder mr-2"></i>Folders
                            </a>
                        </li>
                        @auth
                        <li>
                            <div id="folders" class="collapse">
                                <ul class="nav nav-pills nav-fill flex-column">
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="#new-folder">
                                            <i class="fas fa-plus mr-2"></i>New Folder
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
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
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    @yield('right-sidebar')  
                </div>
            </div>
        </main>
    </div>
</body>
</html>
