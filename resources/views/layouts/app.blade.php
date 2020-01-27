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
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <div class="container">
                        <ul class="nav nav-pills nav-fill flex-column">
                            <li class="nav-item my-1">
                                <a class="nav-link" data-toggle="collapse" href="#lists-list" role="button" aria-expanded="false" aria-controls="lists-list"><i class="fas fa-list mx-2"></i>Lists</a>
                            </li>
                            @auth
                            <li>
                                <div id="lists-list" class="collapse show">
                                    <ul class="nav flex-column my-1">
                                        <li class="nav-item my-1">
                                            <a class="list-group-item list-group-item-action active" href="{{ route('lists.create') }}"><i class="fas fa-plus mx-2"></i>New List</a>
                                        </li>
                                        @foreach(Auth::user()->lists()->orderBy('priority')->get() as $list)
                                        <li class="nav-item my-1">
                                            <a class="list-group-item list-group-item-action" href="{{ route('lists.show', $list->id) }}">{{ $list->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endauth
                            <li class="nav-item my-1">
                                <a class="nav-link" data-toggle="collapse" href="#folders-list" role="button" aria-expanded="false" aria-controls="folders-list"><i class="fas fa-folder mx-2"></i>Folders</a>
                            </li>
                            @auth
                            <li>
                                <div id="folders-list" class="collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item my-1">
                                            <a class="list-group-item list-group-item-action active" href="#new-folder"><i class="fas fa-plus mx-2"></i>New Folder</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="container">
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
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
