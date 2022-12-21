<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Dealer-SBR</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SBR</a>
      </div>
      <ul class="sidebar-menu">
        @if (auth()->user()->hasRole('admin'))
          <li class="menu-header">Dashboard</li>
          <li>
            <a class="nav-link" href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
          </li>
          <li>
            <a class="nav-link" href="{{ url('admin/artikel') }}"><i class="fas fa-newspaper"></i> <span>Data Artikel</span></a>
          </li>
            <li>
              <a class="nav-link" href="{{ url('admin/wilayah') }}"><i class="fas fa-map"></i> <span>Data Wilayah</span></a>
            </li>

            <li>
              <a class="nav-link" href="{{ url('admin/motor') }}"><i class="fas fa-motorcycle fa-lg"></i> <span>Data Motor</span></a>
            </li>
            <li>
              <a class="nav-link" href="{{ url('admin/accesories') }}"><i class="fas fa-cog"></i> <span>Data Accesories</span></a>
            </li>
            <li>
              <a class="nav-link" href="{{ url('admin/dealer') }}"><i class="fas fa-building"></i> <span>Data Dealer</span></a>
            </li>
            <li>
              <a class="nav-link" href="{{ url('admin/yamalube') }}"><i class="fas fa-oil-can"></i> <span>Data Yamalube Oli</span></a>
            </li>
        @endif
      </ul>
{{--         <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div> --}}
    </aside>
  </div>
