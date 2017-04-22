<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}


    {{--JQuery--}}
    <script src="{{asset('js/jquery-3.1.1.min.js')}}" ></script>


    {{--<script>

        $(function(){
            var current = location.pathname;
            $('#nav li a').each(function(){
                var $this = $(this);
                // if the current path is like this link, make it active
                if($this.attr('href').indexOf(current) !== -1){
                    $this.addClass('active');
                }
            })
        })

    </script>



    <style>

        active, a.active {
            color: red;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        li{
            list-style:none;
        }

    </style>--}}


    {{--Chart--}}
    {!! Charts::assets() !!}

    {{--Fusion Chart Libraries--}}
    {{--<script type="text/javascript" src="{{asset('Fusion Chart Libraries/js/fusioncharts.js')}}"></script>
    <script type="text/javascript" src="{{asset('Fusion Chart Libraries/js/themes/fusioncharts.theme.ocean.js')}}"></script>--}}

    {{--Font-awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" id="nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <?php
                            if (session_status() == PHP_SESSION_ACTIVE) {
                                session_destroy();
                            }else{
                                session_start();
                                session_destroy();
                            }

                            ?>

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else
                            <li><a href="{{ route("login") }}">Home</a></li>
                            <li><a href="{{ route('pages.index') }}">Attendence</a></li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
