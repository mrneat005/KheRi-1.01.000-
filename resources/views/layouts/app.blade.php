<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KheRi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="app">
<router-view></router-view>
        <main class="py-4">
            @yield('content')
            @yield('welcome')
            @yield('about')
        </main>
        
        
    </div>

    <script>

    </script>
</body>
</html>
<style>
  body {
  overflow-x: hidden; }

.navbar .nav-link {
  font-size: 14px;
  text-transform: uppercase;
  padding-left: 1em !important;
  padding-right: 1em !important; }

.navbar .nav-item.active {
  border-left: #444 3px solid; }

.carousel-item {
  height: 450px; }

.carousel-image-1 {
  background: url("../img/w002.jpeg");
  background-size: cover; }

.carousel-image-2 {
  background: url("../img/w003.jpeg");
  background-size: cover; }

.carousel-image-3 {
  background: url("../img/w004.jpeg");
  background-size: cover; }

.fa {
  font-size: 55px; }

#home-heading {
  position: relative;
  min-height: 200px;
  background: url("../img/display4.jpg");
  background-attachment: fixed;
  background-repeat: no-repeat;
  text-align: center;
  color: #fff; }

.dark-overlay {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.7);
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; }

#video-play {
  position: relative;
  min-height: 200px;
  background: url("../img/display4.jpg");
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-position: 0 -300px;
  text-align: center;
  color: #fff; }
  #video-play a {
    color: #fff; }

footer#main-footer {
  background: #000;
  color: #fff; }

#page-header {
  height: 200px;
  background: url("../img/image1.jpg");
  background-position: 0 -360px;
  background-attachment: fixed;
  color: #fff;
  border-bottom: 1px #eee solid;
  padding-top: 50px; }

#about img {
  margin-top: -100px; }

#faq .card {
  border: #444; }
  #faq .card a {
    color: #fff;
    text-decoration: none; }

#faq .card-body, #faq .card-header {
  background: #333; }

.about-img{
  margin-top: -50px; 
}


</style>