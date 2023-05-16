<nav class="navbar navbar-expand-lg py-0">
    <div class="container-xxl">
        <a class="navbar-brand me-4" href="{{route('fronthome')}}">
            <img alt="ClickMechanic" src="{{asset('assets/frontend/images/logo.png')}}" width="150"/>
        </a>

        <div class="collapse navbar-collapse" id="main_nav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('howitworks')}}">
                        <span class="nav-link-title">How It Works</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('aboutus')}}">
                        <span class="nav-link-title">About Us</span>
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
            </ul>

        </div> <!-- navbar-collapse.// -->

        <ul class="head-user-links d-lg-inline-flex d-none">
            <li>
                @if(Auth::check())
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
                @else
                <a class="nav-link" href="{{route('login')}}">
                    <span class="nav-link-title">Sign In</span>
                </a>
                @endif
            </li>
            <li>
                <a class="nav-link nav-link-btn" href="{{route('bookingcar')}}">
                    Get started
                </a>
            </li>
        </ul>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>
