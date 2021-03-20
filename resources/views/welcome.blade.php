@extends('layouts.app')

@section('welcome')



<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home">About</a>
          </li>

          <li class="nav-item">
            <router-link to="/about-component" class="nav-link">
                <p>
                    About
                </p>
            </router-link>
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

<!--Caresol-->

<!-- SHOWCASE SLIDER -->
<section id="showcase">
   <div id="myCarousel" class="carousel slide mt-0" data-ride="carousel">
     <ol class="carousel-indicators">
       <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="1"></li>
       <li data-target="#myCarousel" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner">
       <div class="carousel-item carousel-image-1 active">
         <div class="container">
           <div class="carousel-caption d-none d-sm-block text-right mb-5">
             <h1 class="display-3">Heading One</h1>
             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae consequuntur architecto eius magni nobis nulla eaque. Deserunt sunt, distinctio quos.</p>
             <a href="#" class="btn btn-danger btn-lg">Sign Up Now</a>
           </div>
         </div>
       </div>

       <div class="carousel-item carousel-image-2">
         <div class="container">
           <div class="carousel-caption d-none d-sm-block mb-5">
             <h1 class="display-3">Heading Two</h1>
             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae consequuntur architecto eius magni nobis nulla eaque. Deserunt sunt, distinctio quos.</p>
             <a href="#" class="btn btn-primary btn-lg">Learn More</a>
           </div>
         </div>
       </div>

       <div class="carousel-item carousel-image-1">
         <div class="container">
           <div class="carousel-caption d-none d-sm-block text-right mb-5">
             <h1 class="display-3">Heading Three</h1>
             <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae consequuntur architecto eius magni nobis nulla eaque. Deserunt sunt, distinctio quos.</p>
             <a href="#" class="btn btn-success btn-lg">Learn More</a>
           </div>
         </div>
       </div>
     </div>

     <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
       <span class="carousel-control-prev-icon"></span>
     </a>
     <a href="#myCarousel" data-slide="next" class="carousel-control-next">
       <span class="carousel-control-next-icon"></span>
     </a>
   </div>
 </section>






<!--/Caresol-->
<!---->

<!-- HOME ICON SECTION -->
<section id="home-icons" class="py-5">
   <div class="container">
     <div class="row">
       <div class="col-md-4 mb-4 text-center">
         <i class="fa fa-cog mb-2"></i>
         <h3>Turning Gears</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, maxime.</p>
       </div>
       <div class="col-md-4 mb-4 text-center">
         <i class="fa fa-cloud mb-2"></i>
         <h3>Sending Data</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, maxime.</p>
       </div>
       <div class="col-md-4 mb-4 text-center">
         <i class="fa fa-cart-plus mb-2"></i>
         <h3>Making Money</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, maxime.</p>
       </div>
     </div>
   </div>
 </section>

 <!-- HOME HEADING SECTION -->
 <section id="home-heading" class="p-5">
   <div class="dark-overlay">
     <div class="row">
       <div class="col">
         <div class="container pt-5">
           <h1>Are You Ready To Get Started?</h1>
           <p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita voluptates, consequatur labore placeat doloremque dignissimos exercitationem esse fuga laborum ex!</p>
         </div>
       </div>
     </div>
   </div>
 </section>



<!---->

  <!-- INFO SECTION -->
  <section id="info" class="py-3">
   <div class="container">
     <div class="row">
       <div class="col-md-6 align-self-center">
         <h3>Lorem Ipsum</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae eaque quos eligendi, laboriosam. Culpa consequuntur illum facere id molestias.</p>
         <a href="#" class="btn btn-outline-danger btn-lg">Learn More</a>
       </div>
       <div class="col-md-6">
         <img src="img/display3.jpg" class="img-fluid" alt="">
       </div>
     </div>
   </div>
 </section>

 <!-- VIDEO PLAY SECTION -->
 <section id="video-play">
   <div class="dark-overlay">
     <div class="row">
       <div class="col">
         <div class="container p-5">
           <a
             href="#"
             class="video"
             data-video="https://www.youtube.com/embed/njJ8lbrYYjk"
             data-toggle="modal"
             data-target="#videoModal"
           >
             <i class="fa fa-play"></i>
           </a>
           <h1>See What We Do</h1>
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- PHOTO GALLERY -->
 <section id="gallery" class="py-5">
   <div class="container">
     <h1 class="text-center">Photo Gallery</h1>
     <p class="text-center">Check out our photos</p>
     <div class="row mb-4">
       <div class="col-md-4">
         <a href="../img/p004.jfif" data-toggle="lightbox" data-gallery="img-gallery">
           <img src="../img/p004.jfif" class="img-fluid">
         </a>
       </div>
       <div class="col-md-4">
         <a href="../img/p003.jfif" data-toggle="lightbox" data-gallery="img-gallery">
           <img src="../img/p003.jfif" class="img-fluid">
         </a>
       </div>
       <div class="col-md-4">
         <a href="../img/p006.jfif" data-toggle="lightbox" data-gallery="img-gallery">
           <img src="../img/p006.jfif" class="img-fluid">
         </a>
       </div>
     </div>

     <div class="row mb-4">
       <div class="col-md-4">
         <a href="../img/p005.jfif" data-toggle="lightbox" data-gallery="img-gallery">
           <img src="../img/p005.jfif" class="img-fluid">
         </a>
       </div>
       <div class="col-md-4">
         <a href="../img/p007.jfif" data-toggle="lightbox" data-gallery="img-gallery">
           <img src="../img/p007.jfif" class="img-fluid">
         </a>
       </div>
       <div class="col-md-4">
         <a href="../img/p008.jfif" data-toggle="lightbox" data-gallery="img-gallery">
           <img src="../img/p008.jfif" class="img-fluid">
         </a>
       </div>
     </div>
   </div>
 </section>




<!--AboutUs-->

<section>
  <div id="page-header">
    <div class="container bg-dark">
      <div class="row">
        <div class="col-md-6 mauto text-center">
          <h1>About Us</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, debitis!</p>
        </div>
      </div>
    </div>
  </div>

<section id="about" class="py-">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Learn About us</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita modi iure architecto
           laboriosam aliquam, beatae vitae, deleniti provident alias dignissimos porro cupiditate 
           delectus dolorum, unde voluptatem quos quisquam libero. Dolorum alias architecto possimus,
            labore ipsa ducimus perspiciatis 
          recusandae, repellendus eligendi laborum libero in! Necessitatibus illum blanditiis nobis 
          magni, iusto repellendus?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem harum quisquam aperiam 
          adipisci fuga, laboriosam recusandae, voluptatum, voluptates atque natus nostrum est
           molestias? Consectetur at magnam exercitationem sunt debitis dolor ex cum repellendus quas,
            alias amet in incidunt quis. Nulla perferendis adipisci odit, dolor asperiores alias.
             Facilis ipsum voluptates unde?</p>  
      </div>  
      <div class="col-md-6 ">
        <img id="about-img" src="../img/display2.jpg" alt="" class="img-fluid rounded-circle d-none d-md-block about-img">
      </div>
    </div>  


</div>  

</section>3




</section>






<!--/AboutUs-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->






 <!-- NEWSLETTER SECTION -->
 <section id="newsletter" class="text-center p-5 bg-dark text-white">
   <div class="container">
     <div class="row">
       <div class="col">
         <h1>Signup For Our Newsletter</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis magnam similique esse assumenda quasi repellendus illum perferendis quos aliquid possimus.</p>
         <form class="form-inline justify-content-center">
           <label class="sr-only" for="name">Name</label>
           <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Enter Name">

           <label class="sr-only" for="email">Email</label>
           <input type="email" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Enter Email">
           <button class="btn btn-primary" type="submit">Submit</button>
         </form>
       </div>
     </div>
   </div>
 </section>

 <footer id="main-footer" class="text-center p-4">
   <div class="container">
     <div class="row">
       <div class="col">
         <p>Copyright 2021 &copy; KheRi</p>
       </div>
     </div>
   </div>
 </footer>


 <!-- VIDEO MODAL -->
 <div class="modal fade" id="videoModal">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-body">
         <button class="close" data-dismiss="modal"><span>&times;</span></button>
         <iframe src="" height="350" width="100%" frameborder="0" allowfullscreen></iframe>
       </div>
     </div>
   </div>
 </div>



 

<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->




@endsection