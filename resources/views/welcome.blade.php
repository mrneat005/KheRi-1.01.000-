<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="adminlte.css">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

      

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
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
         
                    
        @if (Route::has('login'))
        <div class="">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    

              </div>
            </div>
          </nav>
    </body>
<style>
    .text-blue {
        color: $blue !important;
    }
    .indigo {
        color: $indigo;
    }
    .purple {
        color: $purple;
    }
    .pink {
        color: $pink;
    }
    .red {
        color: $red;
    }
    .orange {
        color: $orange;
    }
    .yellow {
        color: $yellow;
    }
    .green {
        color: $green;
    }
    .teal {
        color: $teal;
    }
    .cyan {
        color: $cyan;
    }
  
  
  
  /**
   * Profile image component
   */
  .profile-header-container{
      margin: 0 auto;
      text-align: center;
  }
  
  .profile-header-img {
      padding: 1px;
  }
  
  .profile-header-img > img.img-circle {
      width: 50px;
      height: 50px;
      border: 2px solid #000000;
  }
  
  
  
  /**
   * Ranking component
   */
  
  
  
  
  
  
  </style>