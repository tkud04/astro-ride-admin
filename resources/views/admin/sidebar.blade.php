<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          KloudTransact Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">hourglass_empty</i>
                  <p class="d-lg-none d-md-block">
                    Auctions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{url('cobra-auctions')}}">View auctions</a>               
                </div>
              </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('cobra-users')}}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('cobra-stores')}}">
              <i class="material-icons">info</i>
              <p>Stores</p>
            </a>
          </li>
          <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">redeem</i>
                  <p class="d-lg-none d-md-block">
                    Coupons
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="{{url('cobra-coupons')}}">View coupons</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('cobra-add-coupon')}}">Add a new coupon</a>
                </div>
              </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('cobra-rc')}}">
              <i class="material-icons">feedback</i>
              <p>Ratings and Comments</p>
            </a>
          </li>          
        </ul>
      </div>
    </div>