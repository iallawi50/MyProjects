<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', ' الرئيسية')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/darkmode.css">
    
</head>
<body  class="{{auth()->user()->darkmode ? "body-dm" : "" }}">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
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

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل دخول') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('إنشاء حساب') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown mr-0 ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <img class="user-image" src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-right {{auth()->user()->darkmode ? "dropdown-dm" : "" }}" aria-labelledby="navbarDropdown">
                                    

                                    <a href="/projects" class="dropdown-item"> 
                                        المشاريع
                                    </a>


                                    <a href="/profile" class="dropdown-item"> 
                                        الملف الشخصي
                                    </a>
                                    

                                    
                                    
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل خروح') }}
                                    </a>
                                    
                                    <hr>



                                    <form action="/profile" method="post" dir="ltr">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" hidden name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">

                                                <input type="email" hidden name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">                
                                                
                                        <div class="form-check form-switch dropdown-item">
                                            <input class="form-check-input" name="darkmode" {{ auth()->user()->darkmode ? 'checked' : ''}} type="checkbox" id="darkmode" onchange="this.form.submit()">
                                            <label class="form-check-label" for="darkmode">دارك مود</label>
                                          </div>
                                    </form>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <div class="container">
                
                @yield('content')
            </div>
        </main>
        <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-primary">
            <div class="container-fluid text-center">
              <a class="text-center mx-auto copyright" style="color: white" target="_blank" href="https://instagram.com/cast.media/">Cast Media &copy; 2021 </a>
              
            </div>
          </nav>
    </div>

    <style>
        .copyright {
            font-size: 12px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
