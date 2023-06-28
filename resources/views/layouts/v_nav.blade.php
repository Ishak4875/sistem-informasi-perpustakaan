<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="/{{'template'}}/assets/img/logo.png" alt="">
        <span>FlexStart</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          @if (Auth::check() == false)
            <li><a class="getstarted scrollto" href="/login">Login</a></li>
          @endif
          @if (Auth::check())
            <li><a class="nav-link scrollto" href="/changePassword">Change Password</a></li>
            <li>
              <a class="getstarted scrollto" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->