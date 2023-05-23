<!doctype html>
<html lang="en">

@include('includes.frontend.head')

<body class="d-flex flex-column min-vh-100 justify-content-center justify-content-md-between">

    <!-- Offcanvas Menu Start -->
    <div class="offcanvas offcanvas-start offcanvas-lg" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <a href="index.html">
                <img alt="ClickMechanic" src="{{asset('assets/frontend/images/logo.png')}}" width="125" />
            </a>
            <button type="button" class="btn_offcanvas_close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fas fa-times-circle"></i>
            </button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <span class="nav-link-title">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="how-it-works.html">
                        <span class="nav-link-title">How It Works</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-link-title">Apply To Be A Mechanic</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-chevron-down" href="#" data-bs-toggle="dropdown">
                        <span class="nav-link-title">Our services</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="nav-link-title">Service 1</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="nav-link-title">Service 2</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="nav-link-title">Service 3</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-link-title">Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-link-title">Sign In</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-link-title">Get Started</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Start -->
    <header>
        @include('includes.frontend.nav')
    </header>
    <!-- Header End -->

    @yield('main-content')


    <!-- footer Start-->
    @include('includes.frontend.footer')
    <!-- footer End-->



    <!-- Js -->
    <script src="{{asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>
