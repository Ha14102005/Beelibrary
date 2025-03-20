  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./assets/index3.html" class="brand-link">
      <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- danh sách sản phẩm -->
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=list-book' ?>" class="nav-link">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Danh sách sản phẩm
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <!-- Danh mục -->
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=list-category' ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Danh mục sản phẩm
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <!-- Quản lí đơn hàng -->
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=list-order' ?>" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Quản lí đơn hàng
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
<!-- Thống kê
<li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=thong-ke' ?>" class="nav-link">
            <i class="fas fa-chart-pie"></i>
              <p>
                Thống kê
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <!-- Bình luận
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="nav-link">
            <i class="fas fa-comments"></i>
              <p>
                Bình luận
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <!-- Quản lí tài khoản -->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <!-- Danh sách các mục con -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Tài khoản quản trị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Tài khoản khách hàng</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>