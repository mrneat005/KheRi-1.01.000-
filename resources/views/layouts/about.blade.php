@extends('layouts.app')

@section('about')


<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
   <div class="container">
       <a class="navbar-brand" href="{{ url('/') }}">
           
       </a>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
             <a class="nav-link" aria-current="page" href="#">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link avtive" href="/about.blade.php">About</a>
           </li>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Dropdown
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="#">Action</a></li>
               <li><a class="dropdown-item" href="#">Another action</a></li>
               <li><hr class="dropdown-divider"></li>
               <li><a class="dropdown-item" href="#">Something else here</a></li>
             </ul>
           </li>
           <li class="nav-item">
             <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
           </li>
         </ul>

       </div>



       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
           <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Left Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>

           <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ml-auto">
               <!-- Authentication Links -->
               @guest
                   <li class="nav-item">
                       <a class=" btn btn-outline-primary rounded-pill nav-link " href="{{ route('login') }}">{{ __('Login')}}</a>
                   </li>
                   @if (Route::has('register'))
                       <li class="nav-item">
                           <a class="  btn btn btn-outline-success rounded-pill nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                       </li>
                   @endif
               @else
                   <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
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
               <form class="d-flex">
                   <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                   <button class="btn btn-outline-warning rounded-pill" type="submit">Search</button>
                 </form>
           </ul>
       </div>
   </div>
</nav>
@endsection