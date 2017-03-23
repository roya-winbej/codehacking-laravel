<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="/admin">Codehacking Laravel</a></h1>
                </div>
            </div>
       {{--     <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="col-md-offset-5 col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}<b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="#"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>

                    <li class="submenu">
                        <a href="#">
                            <i class="glyphicon glyphicon-tasks"></i> Categories
                            <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
                        <ul>
                            <li><a href="{{ route('categories.index') }}">All categories</a></li>
                            <li><a href="{{ route('categories.create') }}">Create category</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i> Users
                            <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
                        <ul>
                            <li><a href="{{route('users.index')}}">All users</a></li>
                            <li><a href="{{route('users.create')}}">Create user</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#">
                            <i class="glyphicon glyphicon-book"></i> Posts
                            <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
                        <ul>
                            <li><a href="{{route('posts.index')}}">All posts</a></li>
                            <li><a href="{{route('posts.create')}}">Create post</a></li>
                        </ul>
                    </li>

                    {{--<li><a href="#"><i class="glyphicon glyphicon-book"></i> test</a></li>--}}


                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title">@yield('content-title')</div>
                        </div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts');

</body>
</html>
