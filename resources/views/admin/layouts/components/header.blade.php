<header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
          <a href="{{ '/' }}">
        {{-- <img class="image1" style="transform: translate(-15px, -13px);" src="{{ asset('assets/images/LOGOSBR2.png') }}" alt="yamaha solo"> --}}
        </a>
        <div class="navbar-brand" href="index.html">
          <h2 style="transform: translate(0px, -5px);">SUMBER BARU<em style="color: white;">&nbsp;REJEKI</em></h2>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
              <a class="nav-link" href="{{ '/' }}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li id="produk-large" class="nav-item {{ Request::is('produk') ? 'active' : null }}"><a class="nav-link" href="{{ url('produk') }}">Produk</a></li>
            <li class="nav-item {{ Request::is('dealer') ? 'active' : null }}"><a class="nav-link" href="{{ url('dealer') }}">Dealer</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">Parts And Accessories</a>

              <div class="dropdown-menu">
                <a class="dropdown-item {{ Request::is('accesories') ? 'active' : null }}" href="{{ url('accesories') }}">YGP</a>
                <a class="dropdown-item" {{ Request::is('yamalube') ? 'active' : null }}href="{{ url('yamalube') }}">YAMALUBE</a>
              </div>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : null }}"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
