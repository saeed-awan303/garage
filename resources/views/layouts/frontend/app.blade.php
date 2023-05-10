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

    <!-- Modal Help/FAQs start -->
    <div class="modal fade" id="helpModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Frequently asked questions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>How it works</h4>
                    <div class="accordion">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_1_1" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">1</span>
                                <span class="accordion_title">How does ClickMechanic work?</span>
                            </button>
                            <div id="FAQs_1_1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>ClickMechanic uses industry-standard data to give you an instant quote, before connecting you with a local mobile mechanic or independent garage to carry out the work.</p>
                                    <p>There are over 1600 mechanics and garages in the network and each has been vetted on their work history, qualifications and insurance. In addition, we ask all customers to review their mechanic so we can remove any unprofessional mechanics from the network and ensure that the standard remains high.</p>
                                    <p>We have a dedicated customer service team based in London to assist you and ensure your booking goes smoothly.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_1_2" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">2</span>
                                <span class="accordion_title">Who are the mechanics?</span>
                            </button>
                            <div id="FAQs_1_2" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>The mechanics are a nationwide network of independent garages and mobile mechanics. We rigorously vet the mechanics before they join the network to ensure they have:</p>
                                    <ul class="bulleted-list">
                                        <li>At least 5 years work experience (average is 20 years)</li>
                                        <li>At least City &amp; Guilds level 2 mechanic qualification (or better)</li>
                                        <li>Public liability &amp; trade insurance</li>
                                    </ul>
                                    <p>Furthermore, our users rate the mechanic after each job, meaning we quickly remove any unprofessional mechanics from the network.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_1_3" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">3</span>
                                <span class="accordion_title">Is there a warranty for your services?</span>
                            </button>
                            <div id="FAQs_1_3" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>Yes. All repairs & services come with a 12-month warranty on both labour and parts. If there’s any defects in the workmanship we’ll work with you to get it resolved at no extra cost.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">Booking</h4>
                    <div class="accordion">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_2_1" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">1</span>
                                <span class="accordion_title">I'm not sure what's wrong, what should I do?</span>
                            </button>
                            <div id="FAQs_2_1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>If you don’t know what’s wrong, we recommend booking a diagnostic inspection and we’ll send a mechanic to find and fix your fault.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_2_2" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">2</span>
                                <span class="accordion_title">When can I book in for?</span>
                            </button>
                            <div id="FAQs_2_2" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>You can book in 7 days a week, 8AM-8PM. We ask for a day's notice when making a booking, so that we can connect you with a mechanic and they can source the parts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_2_3" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">3</span>
                                <span class="accordion_title">I can't find my repair, help!</span>
                            </button>
                            <div id="FAQs_2_3" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>No problem! Please email us at support@clickmechanic.com with your repair details, registration and postcode and we'll send you a tailored quote.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4">On the day</h4>
                    <div class="accordion">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_2_1" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">1</span>
                                <span class="accordion_title">What happens on the day?</span>
                            </button>
                            <div id="FAQs_2_1" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>On the day the mechanic will call you to let you know exactly when they will arrive. Then they'll introduce themselves and either take your car to the garage or get on with the work you've booked.</p>
                                    <p>Once the work has been finished, your mechanic will explain the work they've carried out. Once you're happy and give the go-ahead to invoice, then you'll be charged by the mechanic through the ClickMechanic app and your receipt will be emailed directly to you.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_2_2" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">2</span>
                                <span class="accordion_title">Will I get a mobile mechanic or a garage?</span>
                            </button>
                            <div id="FAQs_2_2" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>For most jobs, we'll send them to both mobile mechanics and independent garages. For jobs that can't be done at the roadside, we'll connect you to a garage, and if your car isn't drivable then we'll connect you with a mobile mechanic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" data-bs-target="#FAQs_2_3" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                <span class="blue-circle-number">3</span>
                                <span class="accordion_title">Do I need to be present for a pre-purchase inspection?</span>
                            </button>
                            <div id="FAQs_2_3" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>No, though the mechanic will need to be able to access the car, so it’s best to liaise with the seller to ensure that they will be available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <p>
                        Didn't find what you need? Email us at <a href="mailto:support@clickmechanic.com">support@clickmechanic.com</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Help/FAQs end -->

    <!-- Js -->
    <script src="{{asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>
