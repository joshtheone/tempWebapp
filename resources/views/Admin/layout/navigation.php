  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background-color:black ;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin<?php echo APP_NAME ?> </span>
    </a>

    <!-- Sidebar -->
    <div class="">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo USER['name'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="fa fa-user nav-icon text-sm"></i>
                  <small>Edit Users</small>
                </a>
              </li>
              <li class="nav-item">
                <a href="menageRoles" class="nav-link">
                  <i class="fa fa-briefcase nav-icon text-sm"></i>
                  <small>Menage User Roles</small>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
              <form action="logout" class="nav-link" method="post">
                  <input type="hidden" name="scrf" value="yfvuerhjf#*&(^*Y(UI%Rer985oruejnd">     
                  <button class="btn text-light" type="submit"><i class="text-light fas fa-arrow-left "></i> logout</button>
              </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>