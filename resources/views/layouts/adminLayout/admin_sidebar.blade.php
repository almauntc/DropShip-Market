 <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{ asset('images/backend_images/faces/icon2.png') }}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }}</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            <!--  <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dropshipper-management/dropshipper') }}">
              <i class="menu-icon mdi mdi-account-location"></i>
              <span class="menu-title">Dropshipper</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/customer') }}">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/products') }}">
              <i class="menu-icon mdi mdi-cube"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/category') }}">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- partial -->