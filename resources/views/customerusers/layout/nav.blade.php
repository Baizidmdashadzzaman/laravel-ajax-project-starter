<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      
           <li class="nav-item  ">
            <a href="{{route('customerusers.dashboard')}}" class="nav-link {{ Request::is('customerusers-dashboard') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#changepassword" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          
      <li class="nav-item">
        <a href="{{route('customerusers.logout')}}" class="nav-link">
          <i class="nav-icon fas fa-power-off"></i>
          <p>
            Logout
          </p>
        </a>
      </li>


    </ul>
  </nav>