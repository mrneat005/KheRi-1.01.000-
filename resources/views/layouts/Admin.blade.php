<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Panel</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="adminlte.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
</head>

<body class="hold-transition sidebar-mini align-self-end ">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-dark sticky-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav content-justify-right">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i style="color:grey;" class="fas fa-bars fa-2x"></i></a>
                </li>
              
               
                
            </ul>
            <!-- Right navbar links -->
  

            <!--DropdownLogout-->
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home" class="nav-link  rounded-pill"><i style="color:grey;" class="fas fa-home fa-2x"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                
                    <router-link to="/cartView-component" class="nav-link">
                       
                        <i style="color:grey;" class="fas fa-cart-plus fa-2x">
                        
                            <span class="badge bg-success" style="width: 2rem; height: 2rem;">{{Cart::session(auth()->id())->getContent()->count()}}</span>
                            </i>
                    </router-link>



                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home" class="nav-link  rounded-pill"><i style="color:grey;" class="fas fa-sms fa-2x"></i></a>
                </li>
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
                            <a class="dropdown-item bg-danger" href="{{ route('logout') }}"
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
            <!--DropdownLogout-->
            <ul>
                <div class="profile-header-container">   
                    <div class="profile-header-img">
                        <img class="img-circle" src="./img/profile/{{ Auth::user()->photo }}" />

                    </div>
                </div> 
            </ul>
        </nav>
        <!-- /.navbar -->
<div class="header bg-dark d-flex flex-row-reverse justify-content-center">
    <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control me-2 rounded-pill" type="search" v-model="search" @keyup.prevent="searchit" placeholder="Search" aria-label="Search">
            <button class="btn  btn btn-outline-warning rounded-pill my-2 my-sm-0" type="submit" @click.prevent="searchit">Search</button>
        </form>
    </ul>
</div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-2 sticky-top">
            <!-- Brand Logo -->
            <!-- Brand Logo -->
       <!--     <img src="./img/logo1.PNG" alt="AdminLTE Logo" class="img-thumbnail img-circle" style="opacity: .4">-->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./img/profile/{{ Auth::user()->photo }}" class="img-circle img-fluid" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      
            

               
               <li class="nav-item">
                            <router-link to="/dashboard-component" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt" style="color: grey;"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>

<!---->


<li class="nav-item">
    <router-link to="/about-component" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt" style="color: grey;"></i>
        <p>
            About
        </p>
    </router-link>
</li>


<li class="nav-item">
    <router-link to="/Services-component" class="nav-link">
    
        <i class=" nav-icon fas fa-concierge-bell" style="color: grey;"></i>
        <p>
            Services
        </p>
    </router-link>
</li>


<li class="nav-item">
    <router-link to="/blog-component" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt" style="color: grey;"></i>
        <p>
            Blog
        </p>
    </router-link>
</li>

<li class="nav-item">
  <a href="/chatify" class="nav-link"><i class="nav-icon fas fa-tachometer-alt" style="color: grey;"></i>
    <p>
        chat
    </p></a>
</li>


<li class="nav-item">
    <router-link to="/contacts-component" class="nav-link">
        <i class=" nav-icon fas fa-id-card-alt" style="color: grey;"></i>
        <p>
            Contact
        </p>
    </router-link>
</li>


<!---->







                        <li class="nav-item">
                            <router-link to="/displayProducts-component" class="nav-link">
                                <i class="nav-icon fas fa-cogs white"></i>
                                <p>
                                    DisplayProducts
                                </p>
                            </router-link>
                        </li>
                        @can('isAdminOrVendor')
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog white"></i>
                                <p>
                                    Management
                                    <i class="right fas fa-angle-left "></i>
                                </p>
                            </a>
                            
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/users-component" class="nav-link">
                                        <i class="nav-icon fas fa-users white"></i>
                                        <p>
                                            Users
                                        </p>
                                    </router-link>
                                </li>
                                
                                <li class="nav-item">
                                    <router-link to="/passport-component" class="nav-link">
                                        <i class="nav-icon fas fa-cogs white"></i>
                                        <p>
                                            Passports
                                        </p>
                                    </router-link>
                                </li>

                                <li class="nav-item">
                                    <router-link to="/profile-component" class="nav-link">
                                        <i class="nav-icon fas fa-address-card white"></i>
                                        <p>
                                            Profile
                                        </p>
                                    </router-link>
                                </li>
                                @endcan








                            </ul>
                          <!--Info-->

@can('isAdminOrVendor')
<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog white"></i>
        <p>
            Info
            <i class="right fas fa-angle-left "></i>
        </p>
    </a>
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <router-link to="/sections-component" class="nav-link">
                
                <i class="fas fa-puzzle-piece white"></i>
                <p>
                    Sections
                </p>
            </router-link>
        </li>
        
        <li class="nav-item">
            <router-link to="/catagory-component" class="nav-link">
                
                <i class="fas fa-angle-double-down white"></i>
                <p>
                    Catagories
                </p>
            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/products-component" class="nav-link">
                <i class="nav-icon fas fa-cogs white"></i>
                <p>
                    Products
                </p>
            </router-link>
        </li>

         @can('isVendor')

        <li class="nav-item">
            <router-link to="/addproduct-component" class="nav-link">
                <i class="nav-icon fas fa-cogs white"></i>
                <p>
                    AddProduct
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/displayproduct-component" class="nav-link">
                <i class="nav-icon fas fa-cogs white"></i>
                <p>
                    DisplayProduct
                </p>
            </router-link>
        </li>
         @endcan
        @endcan
<!--/Info-->  





                    </ul>
                    


                    <li class="nav-item ">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off" style="color:red"></i>
                            <p>
                                Logout
                            </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>


                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header bg-dark">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                    <vue-progress-bar></vue-progress-bar>
                </div>
            </div>




            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                
            </div>
            <!-- Default to the left -->
            <strong>
                
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @auth
<script>
   // window.user = @json(auth()->user())
</script>
@endauth

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>
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