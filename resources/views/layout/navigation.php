  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 bg-dark">
   
    <!-- Sidebar -->
    <div class="">
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar bg-light ">
              <i class="fas fa-search fa-fw "></i>
            </button>
          </div>
        </div>
      </div>
        <style>
          p,.nav-icon{
            color:aliceblue;
          }
        </style>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="userDashboard" id="ddd" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile" class="nav-link">
                  <i class="fa fa-user nav-icon text-sm"></i>
                  <small>Profile</small>
                </a>
              </li>
              <li class="nav-item">
                <a href="gallery" class="nav-link">
                  <i class="fa fa-image nav-icon text-sm"></i>
                  <small>Gallery</small>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
              <form action="logout" class="nav-link" method="post">
                  <input type="hidden" name="scrf" value="yfvuerhjf#*&(^*Y(UI%Rer985oruejnd">    
                  <i class="nav-icon fas fa-arrow-left "></i> 
                  <button class="btn btn-sm text-light" type="submit">logout</button>
              </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>