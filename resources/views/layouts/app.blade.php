<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="stylesheet" href="{{asset('biblio.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md text-light"  style="background-color:#B531A5">
            <div class="container " >
                <a class="navbar-brand text-light" href="#">Aya<span class="text-dark">Bibliithéque</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('service') }}">Services</a>
                            </li>

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Livre
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{route('livre.index')}}">All livres</a>
                                      <a class="dropdown-item" href="{{route('livre.create')}}">Add Livre</a>

                                    </div>
                                  </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Auteur
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{route('auteur.index')}}">All Auteur</a>
                                      <a class="dropdown-item" href="{{route('auteur.create')}}">Add Auteur</a>

                                    </div>
                                  </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Emprunt
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{route('emprunt.index')}}">All Emprunt</a>
                                      <a class="dropdown-item" href="{{route('emprunt.create')}}">Add Emprunt</a>

                                    </div>
                                  </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div>
        @if (session()->has('success'))
        <x-alert type='success'> {{session('success')}}</x-alert>
     @endif
    </div>
    <div>
        @if (session()->has('danger'))
        <x-alert type='danger'> {{session('danger')}}</x-alert>
     @endif
    </div>
    <main class="py-4" >
        @yield('content')
    </main>
    <div >
        <div><h3 class="text-center mt-5">Follow Us </h3> </div>
          <div class="d-flex justify-content-center  mt-4 mb-5 icons">
              <div class=" d-flex mx-3"><img style="width: 25px;" class="mx-2" src="{{asset('images/facebook.svg')}}" alt=""><a href="https://fr-fr.facebook.com/" class="text-dark"> facebook </a></div>
              <div class=" d-flex mx-3"><img style="width: 25px;" class="mx-2" src="{{asset('images/twitter.svg')}}" alt=""><a href="https://twitter.com/" class="text-dark"> twitter </a></div>
              <div class=" d-flex mx-3"><img style="width: 25px;" class="mx-2" src="{{asset('images/linkedin.svg')}}" alt="">  <a href="https://fr.linkedin.com/" class="text-dark"> linkedin</a></div>
          </div>
        </div>
  </div>
        <div class="container-fluid text-center text-white  mt-4 py-2" style="background-color:#B531A5;">© 2022 Books store. All rights reserved | Design by aya biobl.</div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
