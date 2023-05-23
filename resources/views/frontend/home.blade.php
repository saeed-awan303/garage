@extends('layouts.frontend.app')
@section('main-content')
    <main class="d-flex flex-column justify-content-start flex-grow-1">

        <div class="section_hero">
            <div class="container-fluid container-xl">
                <div class="row flex-lg-row-reverse align-items-center">
                    <div class="col-xl-5">
                        <div class="hero_section_image"></div>
                    </div>
                    <div class="col-xl-7 hero_section_content text-center text-xl-start">
                        <h1 class="hero_title">Car repair & servicing made easy</h1>
                        <p class="mt-3">A fair price in seconds, mechanics you can trust, next-day service <strong>at your door</strong></p>
                        <form class="hero_form_booking mt-3" action="booking_car.html">
                            <div class="hero_form_row d-flex flex-column flex-lg-row">
                                <div class="col-lg-6 px-2 py-2 py-xl-0">
                                    <div class="hero_form_wrap has-icon car-icon">
                                        <input type="text" class="form-control" placeholder="Your car reg" name="car_attributes" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 px-2 py-2 py-xl-0">
                                    <div class="hero_form_wrap has-icon location-pin">
                                        <input type="text" class="form-control" placeholder="Your postcode" name="customer_postcode" required="required">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-secondary text-uppercase mt-3" type="submit">Get my instant price →</button>
                            <div class="">
                                <a class="select-by-fields ms-lg-2 mt-2 d-inline-block" href="booking_car.html">I don't know my registration number →</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="custom-shape-divider">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>

        <div class="section_reasons_to_use">
            <div class="container">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 justify-content-sm-center g-4">
                    <div class="col">
                        <div class="reasons_to_use_col text-center">
                            <img class="reason_icon" alt="" src="{{asset('assets/frontend/images/icon-fifty-percent.svg')}}"/>
                            <p class="reason_text">Up to 50% cheaper than franchise dealers</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="reasons_to_use_col text-center">
                            <img class="reason_icon" alt="" src="{{asset('assets/frontend/images/icon-instant-pricing.svg')}}"/>
                            <p class="reason_text">Instant fixed price quotes <br> <span class="fw-normal">(no hidden estimates)</span></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="reasons_to_use_col text-center">
                            <img class="reason_icon" alt="" src="{{asset('assets/frontend/images/icon-vetted.svg')}}"/>
                            <p class="reason_text">Fully vetted & qualified mechanics</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="reasons_to_use_col text-center">
                            <img class="reason_icon" alt="" src="{{asset('assets/frontend/images/icon-warranty.svg')}}"/>
                            <p class="reason_text">1 year parts & repairs warranty</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="reasons_to_use_col text-center">
                            <img class="reason_icon" alt="" src="{{asset('assets/frontend/images/icon-next-day.svg')}}"/>
                            <p class="reason_text">Next day bookings at your home or office</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_how_it_works section_space">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-5">Book a trusted mechanic in just a few clicks</h2>
                    </div>

                    <div class="col-md-4">
                        <a href="#" class="how_it_works_col">
                            <img alt="" src="{{asset('assets/frontend/images/img-choose-repairs.png')}}">
                            <div class="how_it_works_text mt-4">
                                <p class="fw-bold h5">Choose your repairs</p>
                                <p>Select your car, tell us what's wrong, and we'll find the right mechanic for you.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="how_it_works_col">
                            <img alt="" src="{{asset('assets/frontend/images/img-choose-location.png')}}">
                            <div class="how_it_works_text mt-4">
                                <p class="fw-bold h5">Pick a date, time & location</p>
                                <p>Your mechanic will come to whichever address suits you best, at the date and time of your choice.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="how_it_works_col">
                            <img alt="" src="{{asset('assets/frontend/images/img-relax.png')}}">
                            <div class="how_it_works_text mt-4">
                                <p class="fw-bold h5">Sit back and relax!</p>
                                <p>No need to go to the garage - just sit back, grab a drink, and enjoy your favourite show.</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 text-center mt-5">
                        <a href="#" class="btn btn-primary btn_md" data-bs-toggle="modal" data-bs-target="#helpModal">Frequently asked questions</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="section_content_home background_light section_space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 text-center">
                        <h2 class="mb-5">Our quotes are instant, fair and transparent</h2>
                        <p>Ever walked into a workshop and been given a quote only to realise you have no idea if it's a good deal? You're not alone. We found that almost half of car owners have no idea what their car repair should cost.</p>
                        <p>Because of this, we've worked hard to develop the technology to give you an instant quote online based on the millions of data points that we've licensed. First you tell us your car registration and postcode. We use this information to work out how long the requested job should take on your specific car, multiply it by the local labour rate in the area and then add on parts costs.</p>
                        <p>So whether it's car servicing, car repair, clutch replacements or anything else - we'll have a quote for you. If you have any questions about how our quotes work - get in touch!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_our_services section_space">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2>Our services</h2>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 justify-content-center g-4">
                    <div class="col">
                        <div class="our_services_col">
                            <a href="#" class="stretched-link"></a>
                            <img class="our_services_col_icon" alt="" src="{{asset('assets/frontend/images/icon-repairs-icon.svg')}}"/>
                            <h4 class="our_services_col_title">Repairs</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="our_services_col">
                            <a href="#" class="stretched-link"></a>
                            <img class="our_services_col_icon" alt="" src="{{asset('assets/frontend/images/icon-diagnostics.svg')}}"/>
                            <h4 class="our_services_col_title">Diagnostics</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="our_services_col">
                            <a href="#" class="stretched-link"></a>
                            <img class="our_services_col_icon" alt="" src="{{asset('assets/frontend/images/icon-servicing.svg')}}"/>
                            <h4 class="our_services_col_title">Servicing</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="our_services_col">
                            <a href="#" class="stretched-link"></a>
                            <img class="our_services_col_icon" alt="" src="{{asset('assets/frontend/images/icon-mot.svg')}}"/>
                            <h4 class="our_services_col_title">MOT</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="our_services_col">
                            <a href="#" class="stretched-link"></a>
                            <img class="our_services_col_icon" alt="" src="{{asset('assets/frontend/images/icon-tyre.svg')}}"/>
                            <h4 class="our_services_col_title">Tyres</h4>
                        </div>
                    </div>
                    <div class="col">
                        <div class="our_services_col">
                            <a href="#" class="stretched-link"></a>
                            <img class="our_services_col_icon" alt="" src="{{asset('assets/frontend/images/icon-inspection.svg')}}"/>
                            <h4 class="our_services_col_title">Pre-purchase Inspections</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_apply_mechanic background_light section_space">
            <div class="container">
                <div class="row align-items-center flex-md-row-reverse g-4">
                    <div class="col-md-6 text-center">
                        <img alt="" src="{{asset('assets/frontend/images/img_mechanic.jpg')}}"/>
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        <h2 class="mb-4">Apply to be a mechanic</h2>
                        <p class="h4">Join ClickMechanic as a mechanic or garage and accept the work you want. Free to join, with great perks and discounts.</p>
                        <a class="btn btn-primary btn_md mt-4" href="#">Work with ClickMechanic</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_content_home section_space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 text-center">
                        <h2 class="mb-5">Car care just got a whole lot easier</h2>
                        <p>Ever thought auto repair was a nightmare? We did! Which is why we're here to make fixing your vehicle as stress free as possible.</p>
                        <p>Whether it's your clutch or cambelt, alternator or air filter, or just need an MOT and service, our state of the art quoting engine will give you an instant upfront quote based on industry standard data. This means you'll be getting a fair quote, which could save you up to 50%.</p>
                        <p>If you're happy with your quote, simply place your booking and one of our vetted auto mechanics will mend your car or van for the price stated. Not only this but they'll come to you (you don't have to leave your living room!).</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_testimonials background_light section_space">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-5">What our customers are saying</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonials_item">
                            <a href="#" class="stretched-link"></a>
                            <div class="testimonials_item_image_wrapper">
                                <img alt="" src="{{asset('assets/frontend/images/img_testimonial_1.jpg')}}">
                            </div>
                            <div class="testimonials_item_content">
                                <p class="title">Simon Rebbitt</p>
                                <small>BMW 5 Series</small>
                                <blockquote>
                                    <p>The support staff are on hand to help, and the work gets done quickly and at a very <strong>competitive <span>price.</span></strong></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonials_item">
                            <a href="#" class="stretched-link"></a>
                            <div class="testimonials_item_image_wrapper">
                                <img alt="" src="{{asset('assets/frontend/images/img_testimonial_2.jpg')}}">
                            </div>
                            <div class="testimonials_item_content">
                                <p class="title">Barbara Mansour</p>
                                <small>Volkswagen Golf IV</small>
                                <blockquote>
                                    <p>ClickMechanic was fantastic. The mechanic could come to us and, on top of that, it was well-priced.</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonials_item">
                            <a href="#" class="stretched-link"></a>
                            <div class="testimonials_item_image_wrapper">
                                <img alt="" src="{{asset('assets/frontend/images/img_testimonial_3.jpg')}}">
                            </div>
                            <div class="testimonials_item_content">
                                <p class="title">Keith Staines</p>
                                <small>Audi A4</small>
                                <blockquote>
                                    <p>Simply put, I have now used ClickMechanic twice and I will certainly use ClickMechanic again.</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_call_to_action section_space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center mb-4">
                        <h2 class="mb-3">Book a mechanic online today</h2>
                        <p class="call_to_action_subtitle">Get an instant quote, then book a vetted mechanic to fix your car at your home or office.</p>
                    </div>
                    <div class="col-md-9">
                        <form class="cto_form_booking" action="booking_car.html">
                            <div class="d-flex flex-column flex-lg-row">
                                <div class="col-lg-6 px-2 py-2 py-xl-0">
                                    <div class="form_wrap has-icon car-icon">
                                        <input type="text" class="form-control" placeholder="Your car reg" name="car_attributes" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 px-2 py-2 py-xl-0">
                                    <div class="form_wrap has-icon location-pin">
                                        <input type="text" class="form-control" placeholder="Your postcode" name="customer_postcode" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a class="select-by-fields ms-lg-2 mt-2 d-inline-block  h5 text-link" href="booking_car.html">I don't know my registration number</a>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-secondary text-uppercase mt-3 rounded-1" type="submit">Get my instant price</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
     <!-- Modal Help/FAQs start -->
     <div class="modal fade" id="helpModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Frequently asked questions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($faqCats as $cat)
                    <h4>{{$cat->title}}</h4>
                        @foreach ($cat->faqs as $faq)
                        <div class="accordion">
                            <div class="accordion-item">
                                <button class="accordion-button collapsed" data-bs-target="#FAQs_1_1" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                    <span class="blue-circle-number">1</span>
                                    <span class="accordion_title">{{$faq->question}}</span>
                                </button>
                                <div id="FAQs_1_1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>{{$faq->answer}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    @endforeach


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
@endsection
