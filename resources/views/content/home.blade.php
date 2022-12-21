@extends('admin.layouts.app')
<style>
  @import url('https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900');

  .btn:hover,
  .btn:focus,
  .btn:active {
    outline: 0 !important;
  }

  /* entire container, keeps perspective */
  .card-container {
    -webkit-perspective: 800px;
    -moz-perspective: 800px;
    -o-perspective: 800px;
    perspective: 800px;
    margin-bottom: 30px;
  }

  /* flip the pane when hovered */
  .card-container:not(.manual-flip):hover .card,
  .card-container.hover.manual-flip .card {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
  }


  .card-container.static:hover .card,
  .card-container.static.hover .card {
    -webkit-transform: none;
    -moz-transform: none;
    -o-transform: none;
    transform: none;
  }

  /* flip speed goes here */
  .card {
    -webkit-transition: -webkit-transform .5s;
    -moz-transition: -moz-transform .5s;
    -o-transition: -o-transform .5s;
    transition: transform .5s;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
    position: relative;
  }

  /* hide back of pane during swap */
  .front,
  .back {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -o-backface-visibility: hidden;
    backface-visibility: hidden;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #FFF;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.14);
  }

  /* front pane, placed above back */
  .front {
    z-index: 2;
  }

  /* back, initially hidden pane */
  .back {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
    z-index: 3;
  }

  .back .btn-simple {
    position: absolute;
    left: 0;
    bottom: 4px;
  }

  /*        Style       */


  .card {
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 4px;
    color: #444444;
  }

  .card-container,
  .front,
  .back {
    width: 100%;
    height: 420px;
    border-radius: 4px;
    -webkit-box-shadow: 0px 0px 19px 0px rgba(0, 0, 0, 0.16);
    -moz-box-shadow: 0px 0px 19px 0px rgba(0, 0, 0, 0.16);
    box-shadow: 0px 0px 19px 0px rgba(0, 0, 0, 0.16);
  }

  .card .cover {
    height: 200px;
    overflow: hidden;
    border-radius: 4px 4px 0 0;
  }

  .card .cover img {
    width: 100%;
  }

  .card .user {
    border-radius: 50%;
    display: block;
    height: 120px;
    margin: -55px auto 0;
    overflow: hidden;
    width: 120px;
  }

  .card .user img {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 4px solid #FFFFFF;
    width: 100%;
  }

  .card .content {
    background-color: rgba(0, 0, 0, 0);
    box-shadow: none;
    padding: 10px 20px 20px;
  }

  .card .content .main {
    min-height: 20px;
  }

  .card .back .content .main {
    height: 215px;
  }

  .card .name {
    font-family: 'Arima Madurai', cursive;
    font-size: 22px;
    line-height: 28px;
    margin: 10px 0 0;
    text-align: center;
    text-transform: capitalize;
  }

  .card h5 {
    margin: 5px 0;
    font-weight: 400;
    line-height: 20px;
  }

  .card .profession {
    color: #999999;
    text-align: center;
    margin-bottom: 20px;
  }

  .card .footer {
    border-top: 1px solid #EEEEEE;
    color: #999999;
    margin: 30px 0 0;
    padding: 10px 0 0;
    text-align: center;
  }

  .card .footer .social-links {
    font-size: 18px;
  }

  .card .footer .social-links a {
    margin: 0 7px;
  }

  .card .footer .btn-simple {
    margin-top: -6px;
  }

  .card .header {
    padding: 15px 20px;
    height: 90px;
  }

  .card .motto {
    font-family: 'Arima Madurai', cursive;
    border-bottom: 1px solid #EEEEEE;
    color: #999999;
    font-size: 14px;
    font-weight: 400;
    padding-bottom: 10px;
    text-align: center;
  }

  .card .stats-container {
    width: 100%;
    margin-top: 50px;
  }

  .card .stats {
    display: block;
    float: left;
    width: 33.333333%;
    text-align: center;
  }

  .card .stats:first-child {
    border-right: 1px solid #EEEEEE;
  }

  .card .stats:last-child {
    border-left: 1px solid #EEEEEE;
  }

  .card .stats h4 {
    font-family: 'Arima Madurai', cursive;
    font-weight: 300;
    margin-bottom: 5px;
  }

  .card .stats p {
    color: #777777;
  }

  /*      Just for presentation        */

  .title {
    color: #506A85;
    text-align: center;
    font-weight: 300;
    font-size: 44px;
    margin-bottom: 90px;
    line-height: 90%;
  }

  .title small {
    font-size: 17px;
    color: #999;
    text-transform: uppercase;
    margin: 0;
  }

  .space-30 {
    height: 30px;
    display: block;
  }

  .space-50 {
    height: 50px;
    display: block;
  }

  .space-200 {
    height: 200px;
    display: block;
  }

  .white-board {
    background-color: #FFFFFF;
    min-height: 200px;
    padding: 60px 60px 20px;
  }

  .ct-heart {
    color: #F74933;
  }

  pre.prettyprint {
    background-color: #ffffff;
    border: 1px solid #999;
    margin-top: 20px;
    padding: 20px;
    text-align: left;
  }

  .atv,
  .str {
    color: #05AE0E;
  }

  .tag,
  .pln,
  .kwd {
    color: #3472F7;
  }

  .atn {
    color: #2C93FF;
  }

  .pln {
    color: #333;
  }

  .com {
    color: #999;
  }

  .btn-simple {
    opacity: .8;
    color: #666666;
    background-color: transparent;
  }

  .btn-simple:hover,
  .btn-simple:focus {
    background-color: transparent;
    box-shadow: none;
    opacity: 1;
  }

  .btn-simple i {
    font-size: 16px;
  }

  .navbar-brand-logo {
    padding: 0;
  }

  .navbar-brand-logo .logo {
    border: 1px solid #333333;
    border-radius: 50%;
    float: left;
    overflow: hidden;
    width: 60px;
  }

  .navbar .navbar-brand-logo .brand {
    color: #FFFFFF;
    float: left;
    font-size: 18px;
    font-weight: 400;
    line-height: 20px;
    margin-left: 10px;
    margin-top: 10px;
    width: 60px;
  }

  .navbar-default .navbar-brand-logo .brand {
    color: #555;
  }


  /*       Fix bug for IE      */

  @media screen and (-ms-high-contrast: active),
  (-ms-high-contrast: none) {

    .front,
    .back {
      -ms-backface-visibility: visible;
      backface-visibility: visible;
    }

    .back {
      visibility: hidden;
      -ms-transition: all 0.2s cubic-bezier(.92, .01, .83, .67);
    }

    .front {
      z-index: 4;
    }

    .card-container:not(.manual-flip):hover .back,
    .card-container.manual-flip.hover .back {
      z-index: 5;
      visibility: visible;
    }
  }

  .box2 {
    width: 100%;
    height: 5%;
    background: #E8ECEF;
  }

  ul {
    margin: 0px;
    padding: 0px;
  }

  .footer-section {
    background: #151414;
    position: relative;
  }

  /* @media only screen and (max-width: 600px) {
    .footer-section {
      display: none;
    }
  } */

  .footer-cta {
    border-bottom: 1px solid #373636;
  }

  .single-cta i {
    color: #ff5e14;
    font-size: 30px;
    float: left;
    margin-top: 8px;
  }

  .cta-text {
    padding-left: 15px;
    display: inline-block;
  }

  .cta-text h4 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 2px;
  }

  .cta-text span {
    color: #757575;
    font-size: 15px;
  }

  .footer-content {
    position: relative;
    z-index: 2;
  }

  .footer-pattern img {
    position: absolute;
    top: 0;
    left: 0;
    height: 330px;
    background-size: cover;
    background-position: 100% 100%;
  }

  .footer-logo {
    margin-bottom: 30px;
  }

  .footer-logo img {
    max-width: 200px;
  }

  .footer-text p {
    margin-bottom: 14px;
    font-size: 14px;
    color: #7e7e7e;
    line-height: 28px;
  }

  .footer-social-icon span {
    color: #fff;
    display: block;
    font-size: 20px;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 20px;
  }

  .footer-social-icon a {
    color: #fff;
    font-size: 16px;
    margin-right: 15px;
  }

  .footer-social-icon i {
    height: 40px;
    width: 40px;
    text-align: center;
    line-height: 38px;
    border-radius: 50%;
  }

  .facebook-bg {
    background: #3B5998;
  }

  .twitter-bg {
    background: #dd2a7b;
  }

  .google-bg {
    background: red;
  }

  .footer-widget-heading h3 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 40px;
    position: relative;
  }

  .footer-widget-heading h3::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -15px;
    height: 2px;
    width: 50px;
    background: #ff5e14;
  }

  .footer-widget ul li {
    display: inline-block;
    float: left;
    width: 50%;
    margin-bottom: 12px;
  }

  .footer-widget ul li a:hover {
    color: #ff5e14;
  }

  .footer-widget ul li a {
    color: #878787;
    text-transform: capitalize;
  }

  .subscribe-form {
    position: relative;
    overflow: hidden;
  }

  .subscribe-form input {
    width: 100%;
    padding: 14px 28px;
    background: #2E2E2E;
    border: 1px solid #2E2E2E;
    color: #fff;
  }

  .subscribe-form button {
    position: absolute;
    right: 0;
    background: #ff5e14;
    padding: 13px 20px;
    border: 1px solid #ff5e14;
    top: 0;
  }

  .subscribe-form button i {
    color: #fff;
    font-size: 22px;
    transform: rotate(-6deg);
  }

  .copyright-area {
    background: #202020;
    padding: 25px 0;
  }

  .copyright-text p {
    margin: 0;
    font-size: 14px;
    color: #878787;
  }

  .copyright-text p a {
    color: #ff5e14;
  }

  .footer-menu li {
    display: inline-block;
    margin-left: 20px;
  }

  .footer-menu li:hover a {
    color: #ff5e14;
  }

  .footer-menu li a {
    font-size: 14px;
    color: #878787;
  }

  @media (min-width: 802px) {
    .tab-nav-container {
      display: none;
    }
  }

  @media only screen and (min-device-width : 320px) and (max-device-width : 801px) {
    .float {
      display: none;
    }

    /* Navigation */
    .tab-nav-container {
      background-color: rgb(226, 226, 226);
      display: flex;
      padding: 30px;
      justify-content: space-between;
      width: 100%;
      position: fixed;
      bottom: 0;
      z-index: 83;
    }

    .tab {
      background-color: rgb(226, 226, 226);
      border-radius: 50px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 10px;
      margin: 0 5px;
      transition: background 0.4s linear;
    }

    .tab i {
      font-size: 1.2em;
    }
  }

  .float {
    position: fixed;
    width: auto;
    height: auto;
    padding-left: 7px;
    padding-right: 7px;
    top: 50%;
    z-index: 80;
    right: 10px;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    background-color: #2e5894;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    /* box-shadow: 2px 2px 5px #999; */
  }

  /* Mobile Menu */
  .container-mobile {
    background-color: #3B5998;
  }

  /* Hover */
  .hovertext {
    position: relative;
    /* border-bottom: 1px dotted black; */
  }

  /* Hover */
  .hovertext:before {
    content: attr(data-hover);
    visibility: hidden;
    opacity: 0;
    width: 140px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 5px 0;
    transition: opacity 0.7s ease-in-out;
    position: absolute;
    z-index: 1;
    right: 40px;
    top: 50%;
  }

  .hovertext:hover:before {
    opacity: 0.7;
    visibility: visible;
  }
  .mySlides {
    display: none;
    padding: 100px 0;
  }
  @media only screen and (min-device-width : 320px) and (max-device-width : 801px) {
    .mySlides {
    display: none;
    padding: 80px 0;
  }
    }
</style>


   <!-- ***** Preloader End ***** -->
  <!-- Navigation -->
  <div class="tab-nav-container">
    <a href="#" class="tab text-dark">
      <i class="fas fa-phone fa-lg"></i>
    </a>
    <a href="#" class="tab text-dark">
      <i class="fas fa-motorcycle fa-lg"></i>
    </a>
    <a href="#" class="tab text-dark">
      <i class="fas fa-comment fa-lg"></i>
    </a>
    <a href="#" class="tab text-dark">
      <i class="fas fa-map-marker-alt fa-lg"></i>
    </a>
  </div>
  <!--Float Button-->
  @section('content')
  <div class="tab-nav-container" style="height: 80px; background-image: url({{ asset('assets/images/herder.png') }});">
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background:none;">
      <img style="width: 100%;" src="{{ asset('assets/images/CHATME.png') }}" alt="yamaha di solo">
    </a>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background:none;">
      <img style="width: 100%; padding-bottom:10%;" src="{{ asset('assets/images/SKY.png') }}" alt="yamaha di solo">
    </a>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background:none;">
      <img style="width: 90%;" src="{{ asset('assets/images/BOKING SERVICE.png') }}" alt="yamaha di solo">
    </a>
    <!-- <a href="#" class="tab text-dark">
      <i class="fas fa-map-marker-alt fa-lg"></i>
    </a> -->
  </div>
  <!--Float Button-->
  <div class="container float" style="width: 70px; width: absolute;  margin-right: 20px; box-shadow: inset;">
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Contact Person SBR">
        </br>
        </br>
      <img style="width: 60px;; margin-left:-25%; margin-bottom:55%;" src="{{ asset('assets/images/CHATME.png') }}" alt="yamaha di solo">
    </a>

    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Layanan Service Kunjung Yamaha">
      <img style="width: 60px; margin-top: 0px; margin-bottom: -10px; margin-left:-20%; margin-bottom:55%;" src="{{ asset('assets/images/SKY.png') }}" alt="yamaha di solo">
    </a>

    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Layanan Booking Service">
      <img style="width: 60px; margin-bottom: 0%; margin-left:-20%;" src="{{ asset('assets/images/BOKING SERVICE.png') }}" alt="yamaha di solo">
      </br>
       </br>
    </a>
    <!-- <a href="#" class="text-white hovertext" data-hover="Location">
      <i class="fas fa-map-marker-alt fa-lg" style="margin-top:55px; margin-bottom: 22px;"></i>
    </a> -->
  </div>


  <!-- Float Button -->
  <!-- Header -->


  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="w3-content w3-section" style="margin-bottom: -100px;">
    <img class="mySlides" src="{{ asset('assets/images/carousel/11.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/12.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/13.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/14.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/15.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/16.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/17.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/18.png') }}" style="width:100%;" alt="yamaha di solo">
    <img class="mySlides" src="{{ asset('assets/images/carousel/19.png') }}" style="width:100%;" alt="yamaha di solo">
  </div>
  <!-- Banner Ends Here -->
  <!-- Menu Mobile -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-lg-3 col-6 p-2">
        <div class="container container-mobile text-center p-2">
          <a href="{{ url('dealer') }}" class="text-white">
            <i class="fas fa-map-marker-alt fa-lg"></i>
            <p class="text-white">FIND DEALER</p>
          </a>
        </div>
      </div>
            <div class="col-md-3 col-sm-6 col-lg-3 col-6 p-2">
        <div class="container container-mobile text-center p-2">
          <a href="{{ url('produk') }}" class="text-white">
            <i class="fas fa-motorcycle fa-lg"></i>
            <p class="text-white">PRODUCTS</p>
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-lg-3 col-6 p-2">
        <div class="container container-mobile text-center p-2">
          <a href="{{ url('accesories') }}" class="text-white">
            <i class="fas fa-cogs fa-lg"></i>
            <p class="text-white">PART CATALOGUE</p>
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-lg-3 col-6 p-2">
        <div class="container container-mobile text-center p-2">
          <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white">
            <i class="fas fa-phone fa-lg"></i>
            <p class="text-white">CONTACT</p>
          </a>
        </div>
      </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Menu Mobile -->
  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="container" style="width: 100%; height: auto;"
            data-mc-src="f4829f65-35fa-40bc-81c2-9a454afd6b7b#instagram"></div>
          <script src="https://cdn2.woxo.tech/a.js#6274c1455f307f0028236f89" async data-usrc>
          </script>
        </div>
      </div>
      <div style="position: absolute; margin-top: -25px; width: 90%;" class="box2"></div>
    </div>
  </div>
  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Tentang Kami</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <!--<p>sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo sbr solo, yamaha sumber baru rejeki, yamaha sbr solo </p>-->
            <p>Dealer resmi Yamaha Sumber Baru Rejeki tersebar di 27 cabang area Jawa Tengah, Jawa Timur dan Yogyakarta, Yamaha Sumber Baru Rejeki berkomitmen memberikan pelayanan yang terbaik untuk konsumen. </p>
            <ul class="featured-list">
              <li><a href="#">Memberikan kepercayaan</a></li>
              <li><a href="#">Memberikan promo menarik</a></li>
              <li><a href="#">Memberikan kemudahan</a></li>
              <li><a href="#">Memberikan kenyamanan</a></li>
              <li><a href="#">Memberikan pelayanan yang ramah</a></li>
              <li><a href="#">Unit lengkap</a></li>
            </ul>
            <!--<a href="{{ url('about-us') }}" class="filled-button">Read More</a>-->
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img style="width: 300px; height:300px;" src="{{ asset('assets/images/tentangkami.jpeg') }}" alt="yamaha di solo">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="services" style="background-image: url({{ asset('assets/images/background.jpeg') }});" alr="yamaha di solo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Video</h2>
            <!--<a href="{{ url('blog') }}">read more<i class="fa fa-angle-right"></i></a>-->
          </div>
        </div>
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <iframe class="col-md-6" style="margin-bottom: 10px;" width="560" height="315"
                src="https://www.youtube.com/embed/4W0etIxet7Q" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
              <iframe class="col-md-6" width="560" height="315" src="https://www.youtube.com/embed/jUaacJIuRTw"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
 </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Testimoni Pembeli</h2>
            <!--<a href="{{ url('testimonial') }}">read more<i class="fa fa-angle-right"></i></a>-->
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel text-center">
            <div class="service-item">
              <div class="">
<img style="width: 100%; height:auto;" src="{{ asset('assets/images/testi1.jpeg') }}" alt="yamaha di solo">
              </div>
            </div>

            <div class="service-item">
              <div class="">
                <img style="width: 100%; height:auto;" src="{{ asset('assets/images/testi2.jpeg') }}" alt="yamaha solo">
              </div>
            </div>

            <div class="service-item">
              <div class="">
               <img style="width: 100%; height:auto;" src="{{ asset('assets/images/testi3.jpeg') }}" alt="yamaha di solo">
              </div>
            </div>

            <div class="service-item">
              <div class="">
                <img style="width: 100%; height:auto;" src="{{ asset('assets/images/testi4.jpeg') }}" alt="yamaha di solo">
              </div>

            </div>

            <div class="service-item">
              <div class="">
                <img style="width: 100%; height:auto;" src="{{ asset('assets/images/testi5.jpeg') }}" alt="yamaha di solo">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>
      var myIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
      }
      </script>
      <script>
          UA-233470181-1
      </script>
  </br>
  </br>
  </br>


@endsection
