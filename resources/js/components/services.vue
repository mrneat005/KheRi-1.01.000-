<template>
    <div class="container">
          <header id="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center">
          <h1>About Us</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p>
        </div>
      </div>
    </div>
  </header>
        <!-- SERVICES SECTION -->
  <section id="services" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-header">
              <h3>Service Plan One</h3>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                $59.99/Month
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <ul class="list-group">
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature One
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Two
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Three
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Four
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Five
                </li>
              </ul>
              <a href="#" class="btn btn-danger btn-block mt-2">Get It</a>
            </div>
            <div class="card-footer text-muted">
              1 Year Plan
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-header">
              <h3>Service Plan Two</h3>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                $99.99/Month
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <ul class="list-group">
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature One
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Two
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Three
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Four
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Five
                </li>
              </ul>
              <a href="#" class="btn btn-danger btn-block mt-2">Get It</a>
            </div>
            <div class="card-footer text-muted">
              1 Year Plan
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-header">
              <h3>Service Plan Three</h3>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                $129.99/Month
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <ul class="list-group">
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature One
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Two
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Three
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Four
                </li>
                <li class="list-group-item">
                  <i class="fa fa-check"></i> Feature Five
                </li>
              </ul>
              <a href="#" class="btn btn-danger btn-block mt-2">Get It</a>
            </div>
            <div class="card-footer text-muted">
              1 Year Plan
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
    .navbar .nav-link {
  font-size: 14px;
  text-transform: uppercase;
  padding-left: 1em !important;
  padding-right: 1em !important; }

.navbar .nav-item.active {
  border-left: #444 3px solid; }

.carousel-item {
  height: 450px; }



.fa {
  font-size: 55px; }



.dark-overlay {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.7);
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; }



footer#main-footer {
  background: #000;
  color: #fff; }



#about img {
  margin-top: -50px; }

#faq .card {
  border: #444; }
  #faq .card a {
    color: #fff;
    text-decoration: none; }

#faq .card-body, #faq .card-header {
  background: #333; }


.slick-slider
{
    position: relative;

    display: block;
    box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}

.slick-prev,
.slick-next
{
    font-size: 0;
    line-height: 0;

    position: absolute;
    top: 50%;

    display: block;

    width: 20px;
    height: 20px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);

    cursor: pointer;

    color: transparent;
    border: none;
    outline: none;
    background: transparent;
}
.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus
{
    color: transparent;
    outline: none;
    background: transparent;
}
.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before
{
    opacity: 1;
}
.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before
{
    opacity: .25;
}

.slick-prev:before,
.slick-next:before
{
    font-family: 'slick';
    font-size: 20px;
    line-height: 1;

    opacity: .75;
    color: white;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.slick-prev
{
    left: -25px;
}
[dir='rtl'] .slick-prev
{
    right: -25px;
    left: auto;
}
.slick-prev:before
{
    content: '←';
}
[dir='rtl'] .slick-prev:before
{
    content: '→';
}

.slick-next
{
    right: -25px;
}
[dir='rtl'] .slick-next
{
    right: auto;
    left: -25px;
}
.slick-next:before
{
    content: '→';
}
[dir='rtl'] .slick-next:before
{
    content: '←';
}

/* Dots */
.slick-dotted.slick-slider
{
    margin-bottom: 30px;
}

.slick-dots
{
    position: absolute;
    bottom: -25px;

    display: block;

    width: 100%;
    padding: 0;
    margin: 0;

    list-style: none;

    text-align: center;
}
.slick-dots li
{
    position: relative;

    display: inline-block;

    width: 20px;
    height: 20px;
    margin: 0 5px;
    padding: 0;

    cursor: pointer;
}
.slick-dots li button
{
    font-size: 0;
    line-height: 0;

    display: block;

    width: 20px;
    height: 20px;
    padding: 5px;

    cursor: pointer;

    color: transparent;
    border: 0;
    outline: none;
    background: transparent;
}
.slick-dots li button:hover,
.slick-dots li button:focus
{
    outline: none;
}
.slick-dots li button:hover:before,
.slick-dots li button:focus:before
{
    opacity: 1;
}
.slick-dots li button:before
{
    font-family: 'slick';
    font-size: 6px;
    line-height: 20px;

    position: absolute;
    top: 0;
    left: 0;

    width: 20px;
    height: 20px;

    content: '•';
    text-align: center;

    opacity: .25;
    color: black;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-dots li.slick-active button:before
{
    opacity: .75;
    color: black;
}
#page-header {
  height: 200px;
  background: url("/img/w002.jpeg");
  background-position: 0 -360px;
  background-attachment: fixed;
  color: #fff;
  border-bottom: 1px #eee solid;
  padding-top: 50px; }
</style>