<aside class="main-sidebar elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 d-flex justify-content-center">
        <div class="image">
          <h3><span style="color: #007bff">E-</span><span>STORE</span></h3>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Frontend
              </p>
            </a>
          </li>
          <li class="nav-header">MENU UTAMA</li>
          <li class="nav-item">
            <a href="{{ url('/admin/kategori') }}" class="nav-link {{ request()->is('admin/kategori') ? 'active' : '' }}">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/produk') }}" class="nav-link {{ request()->is('admin/produk') ? 'active' : '' }}">
              <i class="nav-icon fa fa-shopping-bag"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/toko') }}" class="nav-link {{ request()->is('admin/toko') ? 'active' : '' }}">
              <i class="nav-icon fa fa-store"></i>
              <p>
                Toko
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/pemesanan') }}" class="nav-link {{ request()->is('admin/pemesanan') ? 'active' : '' }}">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Pemesanan
              </p>
            </a>
          </li>

          <li class="nav-header">MENU LAINNYA</li>
          <li class="nav-item">
            <a href="{{ url('admin/user') }}" class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
