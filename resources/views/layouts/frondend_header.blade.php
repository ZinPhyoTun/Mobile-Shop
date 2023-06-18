<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <h1 class="logo me-auto me-lg-0"><a href="/">Mobile Shop</a></h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="@yield('home-active')" href="/">Home</a></li>
                <li><a class="@yield('about-active')" href="#">About</a></li>
                <li><a class="@yield('contact-active')" href="#">Contact</a></li>
                @guest
                    <li><a class="@yield('login-active')" href="{{ route('login') }}">Sign In</a></li>
                    <li><a class="@yield('register-active')" href="{{ route('register') }}">Sign Up</a></li>
                @endguest
                @auth
                    <li><a href="#" class="logout-btn">Sign Out&nbsp;<small class="text-info">({{auth()->user()->name}})</small></a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <form action="{{ route('logout') }}" method="post" id="logout-form">
            @csrf
        </form>

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>

    </div>

</header><!-- End Header -->
