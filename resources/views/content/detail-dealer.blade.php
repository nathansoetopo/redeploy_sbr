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
      height: 105px;
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
      min-height: 160px;
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

  .hover {
      overflow: hidden;
      position: relative;
      padding-bottom: 60%;
  }

  .hover-overlay {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 90;
      transition: all 0.4s;
  }

  .hover img {
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      transition: all 0.3s;
  }

  .hover-content {
      position: relative;
      z-index: 99;
  }


  /* DEMO 1 ============================== */
  .hover-1 img {
      width: 105%;
      position: absolute;
      top: 0;
      left: -5%;
      transition: all 0.3s;
  }

  .hover-1-content {
      position: absolute;
      bottom: 0;
      left: 0;
      z-index: 99;
      transition: all 0.4s;
  }

  .hover-1 .hover-overlay {
      background: rgba(0, 0, 0, 0.5);
  }

  .hover-1-description {
      transform: translateY(0.5rem);
      transition: all 0.4s;
      opacity: 0;
  }

  .hover-1:hover .hover-1-content {
      bottom: 2rem;
  }

  .hover-1:hover .hover-1-description {
      opacity: 1;
      transform: none;
  }

  .hover-1:hover img {
      left: 0;
  }

  .hover-1:hover .hover-overlay {
      opacity: 0;
  }


  /* DEMO 2 ============================== */
  .hover-2 .hover-overlay {
      background: linear-gradient(to top, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1));
  }

  .hover-2-title {
      position: absolute;
      top: 50%;
      left: 0;
      text-align: center;
      width: 100%;
      z-index: 99;
      transition: all 0.3s;
  }

  .hover-2-description {
      width: 100%;
      position: absolute;
      bottom: 0;
      opacity: 0;
      left: 0;
      text-align: center;
      z-index: 99;
      transition: all 0.3s;
  }

  .hover-2:hover .hover-2-title {
      transform: translateY(-1.5rem);
  }

  .hover-2:hover .hover-2-description {
      bottom: 0.5rem;
      opacity: 1;
  }

  .hover-2:hover .hover-overlay {
      background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1));
  }


  /* DEMO 3 ============================== */
  .hover-3::after {
      content: '';
      width: calc(100% - 3rem);
      height: calc(100% - 3rem);
      border: 1px solid #fff;
      position: absolute;
      top: 1.5rem;
      left: 1.5rem;
      z-index: 90;
      transition: all 0.3s;
      transform: scale(1.1);
      opacity: 0;
      display: block;
      opacity: 0;
  }

  .hover-3-content {
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      transform: translateY(-50%);
      text-align: center;
      z-index: 99;
  }

  .hover-3-description {
      opacity: 0;
      transform: scale(1.3);
      transition: all 0.3s;
  }

  .hover-3 img {
      width: 110%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }

  .hover-3 .hover-overlay {
      background: rgba(0, 0, 0, 0.2);
  }

  .hover-3:hover img {
      width: 100%;
  }

  .hover-3:hover::after {
      opacity: 1;
      transform: none;
  }

  .hover-3:hover .hover-3-description {
      opacity: 1;
      transform: none;
  }

  .hover-3:hover .hover-overlay {
      background: rgba(0, 0, 0, 0.8);
  }


  /* DEMO 4 ============================== */
  .hover-4 img {
      width: 110%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }

  .hover-4 .hover-overlay {
      background: rgba(0, 0, 0, 0.4);
      z-index: 90;
  }

  .hover-4-title {
      position: absolute;
      bottom: 0;
      right: 0;
      padding: 3rem;
      z-index: 99;
  }

  .hover-4-description {
      position: absolute;
      top: 2rem;
      left: 2rem;
      text-align: right;
      border-right: 3px solid #fff;
      padding: 0 1rem;
      z-index: 99;
      transform: translateX(-1.5rem);
      opacity: 0;
      transition: all 0.3s;
  }

  @media (min-width: 992px) {
      .hover-4-description {
          width: 50%;
      }
  }

  .hover-4:hover img {
      width: 100%;
  }

  .hover-4:hover::after {
      opacity: 1;
      transform: none;
  }

  .hover-4:hover .hover-4-description {
      opacity: 1;
      transform: none;
  }

  .hover-4:hover .hover-overlay {
      background: rgba(0, 0, 0, 0.8);
  }


  /* DEMO 5 ============================== */
  .hover-5::after {
      content: '';
      width: 100%;
      height: 10px;
      background: #2e5894;
      position: absolute;
      bottom: -10px;
      left: 0;
      display: block;
      transition: all 0.3s;
      z-index: 999;
  }

  .hover-5 .hover-overlay {
      background: rgba(0, 0, 0, 0.4);
  }

  .hover-5-title {
      position: absolute;
      bottom: 1rem;
      left: 0;
      transition: all 0.3s;
      padding: 2rem 3rem;
      z-index: 99;
  }

  .hover-5-title span {
      transition: all 0.4s;
      opacity: 0;
      color: #2e5894;
  }

  .hover-5:hover .hover-overlay {
      background: rgba(0, 0, 0, 0.8);
  }

  .hover-5:hover .hover-5-title {
      bottom: 0;
  }

  .hover-5:hover .hover-5-title span {
      opacity: 1;
  }

  .hover-5:hover::after {
      bottom: 0;
  }

  .footer-section {
      background: #151414;
      position: relative;
  }

  @media only screen and (max-width: 600px) {
      .footer-section {
          display: none;
      }
  }

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

</style>

@section('content')

<div class="tab-nav-container" style="height: 80px; background-color:#3E8ED6;">
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background-color:#3E8ED6;">
      <img style="width: 100%;" src="{{ asset('assets/images/CHATME.png') }}">
    </a>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background-color:#3E8ED6;">
      <img style="width: 100%;" src="{{ asset('assets/images/SKY.png') }}">
    </a>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background-color:#3E8ED6;">
      <img style="width: 90%;" src="{{ asset('assets/images/BOKING SERVICE.png') }}">
    </a>
    <!-- <a href="#" class="tab text-dark">
      <i class="fas fa-map-marker-alt fa-lg"></i>
    </a> -->
  </div>
  <!--Float Button-->
  <div class="container float" style="width: 70px; margin-right: 20px; box-shadow: inset;">
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Contact Person SBR">
      <img style="width: 60px; margin-top: 32px; margin-left:-25%;" src="{{ asset('assets/images/CHATME.png') }}">
    </a>
    <br>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Layanan Service Kunjung Yamaha">
      <img style="width: 60px; margin-top: 0px; margin-bottom: -10px; margin-left:-20%;" src="{{ asset('assets/images/SKY.png') }}">
    </a>
    <br>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Layanan Booking Service">
      <img style="width: 60px; margin-bottom: 0px; margin-left:-20%;" src="{{ asset('assets/images/BOKING SERVICE.png') }}">
    </a>
    <br>
    <!-- <a href="#" class="text-white hovertext" data-hover="Location">
      <i class="fas fa-map-marker-alt fa-lg" style="margin-top:55px; margin-bottom: 22px;"></i>
    </a> -->
  </div>
    

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url({{ asset('assets/images/heading-6-1920x500.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Cari Dealermu sekarang!</h4>
              <h2>Harga Murah dan terpercaya!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div>
              <img src="{{ asset($dealers->gambar) }}" alt="" class="img-fluid wc-image">
            </div>
            <br>
          </div>

          <div class="col-md-6">
            <form action="#" method="post" class="form">
              <ul class="list-group list-group-flush mb-4">
               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left">Nama Dealer</span>

                         <strong class="pull-right">{{ $dealers->nama_dealer }}</strong>
                    </div>
               </li>

               <li class="list-group-item">
                    <div class="clearfix">
                         <span class="pull-left">Lokasi</span>

                         <strong class="pull-right">{{ $dealers->lokasi }}</strong>
                    </div>
               </li>
              </ul>
              <iframe src="{{ $dealers->link_lokasi }}" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </form>
          </div>
        </div>
      </div>
    </div>       



   

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="section-heading">
              <h2>Contact Details</h2>
            </div>
            
            <div class="left-content">
              <p>
                <span>Name</span>

                <br>

                <strong>Michael Adzan Isnaindra</strong>
              </p>

              <p>
                <span>Phone</span>

                <br>
                
                <strong>
                  <a href="tel:123-456-789">63401873</a>
                </strong>
              </p>

              <p>
                <span>Mobile phone</span>

                <br>
                
                <strong>
                  <a href="tel:456789123">0832738748223</a>
                </strong>
              </p>

              <p>
                <span>Email</span>

                <br>
                
                <strong>
                  <a href="mailto:john@carsales.com">Michaeladzan@test.test</a>
                </strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

   
  

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    @endsection

   