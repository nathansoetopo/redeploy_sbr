@extends('admin.layouts.app')

<style>
  .product-item img {
	width: 100%;
  height: 400px;
	overflow: hidden;
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

 @section('content')
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
      <img style="width: 100%;" src="{{ asset('assets/images/CHATME.png') }}">
    </a>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background:none;">
      <img style="width: 100%; padding-bottom:10%;" src="{{ asset('assets/images/SKY.png') }}">
    </a>
    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="tab text-dark" style="background:none;">
      <img style="width: 90%;" src="{{ asset('assets/images/BOKING SERVICE.png') }}">
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
      <img style="width: 60px;; margin-left:-25%; margin-bottom:55%;" src="{{ asset('assets/images/CHATME.png') }}">
    </a>

    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Layanan Service Kunjung Yamaha">
      <img style="width: 60px; margin-top: 0px; margin-bottom: -10px; margin-left:-20%; margin-bottom:55%;" src="{{ asset('assets/images/SKY.png') }}">
    </a>

    <a href="https://api.whatsapp.com/send/?phone=%2B6281329296789&text&app_absent=0" class="text-white hovertext" data-hover="Layanan Booking Service">
      <img style="width: 60px; margin-bottom: 0%; margin-left:-20%;" src="{{ asset('assets/images/BOKING SERVICE.png') }}">
      </br>
       </br>
    </a>
    <!-- <a href="#" class="text-white hovertext" data-hover="Location">
      <i class="fas fa-map-marker-alt fa-lg" style="margin-top:55px; margin-bottom: 22px;"></i>
    </a> -->
  </div>


  <!-- Float Button -->
  <!-- Header -->

    <div class="products" style="margin-top:0px; padding-top:90px; padding-bottom:200px;">
      <div class="container">
            <h2 class="mt-5">Matic Oil</h2>
            <div class="row">
              @foreach ($matic as $m)
                <div class="col-md-3">
                  <div>
                      <center>
                    <img style="width:100%; height:100%; padding-top:30%;" src="{{ asset($m->gambar) }}" alt="">

                    <div class="down-content">
                      <a><h4>{{ $m->nama_oli }}</h4></a>
                      <h6>{{ $m->harga }}</h6>
                    </div>
                    </center>
                  </div>
                </div>
              @endforeach
            </div>
            <br>
            <h2 class="mt-5">Sport Oil</h2>
            <div class="row">
              @foreach ($sport as $s)
                <div class="col-md-3">
                  <div>
                      <center>
                    <img style="width:100%; height:100%; padding-top:30%;" src="{{ asset($s->gambar) }}" alt="">

                    <div class="down-content">
                      <a><h4>{{ $s->nama_oli }}</h4></a>
                      <h6>{{ $s->harga }}</h6>
                    </div>
                    </center>
                  </div>
                </div>
              @endforeach
            </div>
            <br>
            <h2 class="mt-5">Moped Oil</h2>
            <div class="row">
              @foreach ($moped as $m)
                <div class="col-md-3">
                  <div>
                      <center>
                    <img style="width:100%; height:100%; padding-top:30%;" src="{{ asset($m->gambar) }}" alt="">

                    <div class="down-content">
                      <a><h4>{{ $m->nama_oli }}</h4></a>
                      <h6>{{ $m->harga }}</h6>
                    </div>
                    </center>
                  </div>
                </div>
              @endforeach
            </div>
            <br>
            <h2 class="mt-5">Chemical</h2>
            <div class="row">
              @foreach ($chemical as $c)
                <div class="col-md-3">
                  <div>
                      <center>
                    <img style="width:100%; height:100%; padding-top:30%;" src="{{ asset($c->gambar) }}" alt="">

                    <div class="down-content">
                      <a><h4>{{ $c->nama_oli }}</h4></a>
                      <h6>{{ $c->harga }}</h6>
                    </div>
                    </center>
                  </div>
                </div>
              @endforeach
            </div>
            <br>
            <h2 class="mt-5">Yamalube Technology</h2>
            <div class="row">
              @foreach ($yamalube as $y)
                <div class="col-md-3">
                  <div>
                      <center>
                    <img style="width:100%; height:100%; padding-top:30%;" src="{{ asset($y->gambar) }}" alt="">

                    <div class="down-content">
                      <a><h4>{{ $y->nama_oli }}</h4></a>
                      <h6>{{ $y->harga }}</h6>
                    </div>
                    </center>
                  </div>
                </div>
              @endforeach
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
@endsection
