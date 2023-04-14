<nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <img src="/images/LOGO-3.png" alt="" srcset="" class="logox">
      <div class="nav-links">
        <div class="sidebar-logo">
          <!-- <span class="logo-name">CodingLab</span> -->
          <img src="/images/LOGO-3.png" alt="" srcset="" class="logox">
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="/home">Home</a></li>
          <li><a href="#news-announce">Announcements</a></li>
          <li>
            <a href="#">ALUMNI</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="/home-alumni-membership">Apply for Alumni Membership</a></li>
              <li><a href="/home-alumni-id">Apply for Alumni ID</a></li>
              <li><a href="/home-reissuance">Re-issueance for Alumni ID</a></li>
            </ul>
          </li>
          
          <li><a href="#about_sec">About Us</a></li>
          <li><a href="#about_sec">Contact Us</a></li>
        </ul>
      </div>
      <!-- <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
          <img src="/images/LOGO-3.png" alt="" srcset="" class="logox">
        </div>
      </div> -->
      <div class="user-profile" onclick="menuToggle();">

        @if(Auth::user()->profile_picture)
            <img src="{{ asset('images/user_profile/' . Auth::user()->profile_picture) }}" class="user_icon" height="42" width="42" style="object-fit: cover;">
        @else
            <img src="/images/default-user.webp" class="user_icon" height="42" width="42" style="object-fit: cover;">
        @endif
      </div>
    </div>

    <div class="pro-menu-wrap">
        <div class="pro-menu">
            <div class="user-info">

            @if (Auth::check())
              <div><h5>{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}, {{ Auth::user()->last_name }}</h5></div>
              <div><span>{{ Auth::user()->email }}</span></div>
            @endif
                    
            </div>
            <hr>

        <a href="/home-account" class="pro-menu-link">
            <!-- <img src="/images/profile/setting.png"> -->
            <span>Account Settings</span>
        </a>
        
        <a href="/records-of-students" class="pro-menu-link">
            <!-- <img src="/images/profile/setting.png"> -->
            <span>My Records</span>
        </a>
        <a href="/clientlogout" class="pro-menu-link">
            <!-- <img src="/images/profile/logout.png"> -->
            <span>Logout</span>
        </a>



        </div>
    </div>

  </nav>