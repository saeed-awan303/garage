@extends('layouts.frontend.app')
@section('main-content')
    <!-- Booking flow progress start-->
    <div class="booking-flow-progress">
        <div class="booking-flow-progress-inner">
            <ul class="booking-flow-progress-steps">
                <li class="is-complete">
                    <a href="{{route('bookingcar')}}">1</a>
                    <p class="progress-step-context">Car</p>
                </li>
                <li class="is-complete">
                    <a href="{{route('workdetails')}}">2</a>
                    <p class="progress-step-context">Select work</p>
                </li>
                <li class="is-current">
                    <a href="#">3</a>
                    <p class="progress-step-context">Details</p>
                </li>
                <li>
                    <a href="#">4</a>
                    <p class="progress-step-context">Book</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- Booking flow progress end-->

    <main class="d-flex flex-column justify-content-start flex-grow-1 background_content">

        <div class="section_content py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="panel mb-3">
                            <div class="basket-summary totals">
                                <div class="basket-summary-title mb-1">Total price</div>
                                <div class="mb-2">
                                    <div class="prices">
                                        <div class="our-price">£<span>{{$details['total_price']}}</span></div>
                                        <div class="vat-info text-muted">
                                            Quote includes VAT where
                                            <span class="text-nowrap">applicable
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#vat-Info-Modal">
                                                    <i class="fa fa-question-circle"></i>
                                                </a>
                                            </span>
                                            <!-- Modal VAT info start -->
                                            <div class="modal fade text-black" id="vat-Info-Modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title">Does the price include VAT?</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>The total price shown always includes VAT, if it applies. Whether VAT applies will depend on the VAT status of the mechanic who completes the work. ClickMechanic works with independent mechanics and garages, and each business has its own VAT status.</p>
                                                            <p>A VAT invoice is not available as standard. If you require a VAT invoice, we ask that you make it clear during the booking process by adding a note to your booking and recommend you mention to the mechanic before they attend to avoid disappointment.</p>
                                                            <p>If you request a VAT receipt please be aware this will limit the pool of potential mechanics to complete your chosen work to those who are VAT registered. We are then reliant on the coverage of VAT registered mechanics in your area.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal VAT info end -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="basket-user-details">
                                    <li>AC 212 3.5L Petrol 2000</li>
                                    <li>W12 7SB</li>
                                </ul>
                                <div class="basket-detail-section quoted-items my-2">
                                    <ul class="basket-user-details">
                                        <li>Car Won't Start Inspection</li>
                                        <li>Labour time: Up to 0.9 hours</li>
                                    </ul>
                                    <ul class="basket-user-details">
                                        <li>Standard Pre-purchase Inspection</li>
                                        <li>Labour time: 1-2 hours</li>
                                    </ul>
                                </div>
                                <div class="basket-detail-section my-2">
                                    <p>If you have any questions please check our <a class="text-link" data-bs-target="#helpModal" data-bs-toggle="modal" href="#">help centre</a></p>
                                </div>
                            </div>
                        </div>

                        <form id="booking_details_form" action="{{route('bookingdetails')}}" method="post">
                            @csrf
                            <input type="hidden" name="booking_details" value="1">
                            <div class="booking-details-section">
                                <div class="booking-details-section-heading">
                                    <span class="booking-details-section-heading-number">1</span>
                                    <h3 class="booking-details-section-heading-title">Your details</h3>
                                </div>
                                <div class="row mb-3 g-3">
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">First name</label>
                                        <input class="form-control" placeholder="First name" type="text" name="first_name" id="booking_user_attributes_first_name" value="{{ old('first_name') ?? (isset($details['first_name']) ? $details['first_name'] : '') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last name</label>
                                        <input class="form-control" placeholder="Last name" type="text" name="last_name" id="booking_user_attributes_last_name" value="@if(isset($details['last_name'])){{$details['last_name']}}@endif">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control"  placeholder="Email" type="email" name="email" id="booking_user_attributes_email" value="@if(isset($details['email'])){{$details['email']}}@endif">
                                </div>

                                <div class="row mb-3 g-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="marketing_opt_in" id="marketing_opt_in" value="true" checked="checked">
                                            <label for="marketing_opt_in">
                                                Opt in to receive MOT reminders and monthly promotions from ClickMechanic
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <a class="text-decoration-underline text-muted fs-8" data-modal-id="register-login-modal" href="#">Sign in with an existing account</a>

                            </div>

                            <div class="booking-details-section">
                                <div class="booking-details-section-heading">
                                    <span class="booking-details-section-heading-number">2</span>
                                    <h3 class="booking-details-section-heading-title">WORK DETAILS</h3>
                                </div>
                                <div class="info-panel mb-4">Describe the problem in as much detail as possible. Try to include the
                                    symptoms and details of any other diagnostics you've had done.
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="booking_notes_1">Details</label>
                                    <textarea class="form-control" rows="4" id="booking_notes_1" placeholder="write as much details as possible" name="work_details">@if(isset($details['work_details'])){{$details['work_details']}}@endif</textarea>
                                </div>
                                <div class="info-panel">
                                    <p id="inspection-service-info-title" class="show-repair-info d-flex justify-content-between mb-0">
                                        <span>
                                            Please note, this is an <strong>inspection service</strong> only.
                                        </span>
                                        <a id="inspection-service-more-info-toggle" class="text-decoration-none" data-bs-toggle="collapse" href="#inspection-service-more-info"><span>More info</span> <i class="fas fa-caret-down"></i></a>
                                    </p>
                                    <div id="inspection-service-more-info" class="collapse">
                                      <p>Although the mechanics on our network often identify and fix faults during the inspection time. The quoted
                                        price does not include any additional labour or parts that may be required to repair your vehicle. In rare
                                        instances additional labour time may be required to diagnose the problem, but you will always be made aware
                                        of this and have the option to decide to continue before any further charges are incurred.</p>
                                      <p>After the inspection, your mechanic will quote on any additional labour or parts, and will always endeavor
                                        to carry out the repairs as soon as possible.</p>
                                    </div>
                                  </div>
                            </div>

                            <div class="booking-details-section">
                                <div class="booking-details-section-heading">
                                    <span class="booking-details-section-heading-number">3</span>
                                    <h3 class="booking-details-section-heading-title">BOOKING ADDRESS & PHONE</h3>
                                </div>
                                <div class="row mb-3 g-3">
                                    <div class="col-md-6">
                                        <label for="booking_customer_street_address" class="form-label">Street address 1</label>
                                        <input class="form-control" placeholder="Street address" type="text" name="street_address_1" id="booking_customer_street_address" value="@if(isset($details['street_address_1'])){{$details['street_address_1']}}@endif">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="booking_customer_street_address_2" class="form-label">Street address 2 (optional)</label>
                                        <input class="form-control" placeholder="Street address" type="text" name="street_address_2" id="booking_customer_street_address_2" value="@if(isset($details['street_address_2'])){{$details['street_address_2']}}@endif">
                                    </div>
                                </div>
                                <div class="row mb-3 g-3">
                                    <div class="col-md-6">
                                        <label for="booking_customer_city" class="form-label">City</label>
                                        <input class="form-control" placeholder="City" type="text" name="city" id="booking_customer_city" value="@if(isset($details['city'])){{$details['city']}}@endif">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Postcode</label>
                                        <input type="text" value="W12 7SB" disabled="" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mb-3 g-3">
                                    <div class="col-md-6">
                                        <label for="booking_customer_phone" class="form-label">Phone number</label>
                                        <input class="form-control" placeholder="Phone number" type="tel" name="phone_number" id="booking_customer_phone" value="@if(isset($details['phone_number'])){{$details['phone_number']}}@endif">
                                    </div>
                                </div>

                                <p class="text-muted fs-8">We'll use this phone number to send you updates about your booking.</p>
                                <hr>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="booking_seller_name" class="form-label">Seller's name, or point of contact name</label>
                                        <input class="form-control" placeholder="Name" type="text" name="seller_name" id="booking_seller_name" value="@if(isset($details['seller_name'])){{$details['seller_name']}}@endif">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="booking_seller_phone" class="form-label">Seller's phone number</label>
                                        <input class="form-control" placeholder="Phone number" type="tel" name="seller_phone_number" id="booking_seller_phone" value="@if(isset($details['seller_phone_number'])){{$details['seller_phone_number']}}@endif">
                                    </div>
                                </div>
                            </div>

                            <div class="booking-details-section">
                                <div class="booking-details-section-heading">
                                    <span class="booking-details-section-heading-number">4</span>
                                    <h3 class="booking-details-section-heading-title">WHEN IS THE VEHICLE AVAILABLE?</h3>
                                </div>
                                <div class="info-panel mb-4">Please select ALL of the times when you are available across multiple days. Once a mechanic has been assigned you will receive a 2-hour arrival window.
                                </div>
                            </div>

                            <div class="booking-details-section">
                                <div class="booking-details-section-heading">
                                    <span class="booking-details-section-heading-number">5</span>
                                    <h3 class="booking-details-section-heading-title">CAR REGISTRATION</h3>
                                </div>
                                <div class="info-panel mb-4">Please select ALL of the times when you are available across multiple days. Once a mechanic has been assigned you will receive a 2-hour arrival window.
                                </div>
                                <div class="">
                                    <label for="booking_vehicle_vrm" class="form-label">Please provide your vehicle's registration number.</label>
                                    <input class="form-control string required" placeholder="Registration number" type="text" name="car_registration_number" id="booking_vehicle_vrm" value="@if(isset($details['car_registration_number'])){{$details['car_registration_number']}}@endif">
                                </div>
                            </div>

                            <div class="booking-details-section">
                                <div class="booking-details-section-heading">
                                    <span class="booking-details-section-heading-number">6</span>
                                    <h3 class="booking-details-section-heading-title">YOUR VEHICLE</h3>
                                </div>
                                <p class="text-muted mb-4 fs-7">
                                    <strong>We'll offer your booking to mobile mechanics &amp; workshops who provide collection &amp; delivery.</strong>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#c-and-d-learn-more-modal">Learn more</a>
                                </p>
                                <!-- c-and-d-learn-more-modal -->
                                <div class="modal fade" id="c-and-d-learn-more-modal" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title">Learn more about our different providers</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="fs-7">Mobile mechanics</h5>
                                                <p>
                                                    ClickMechanic works with a nationwide network of independent vetted mobile mechanics, who can undertake and carry
                                                    out all repairs and services. All mechanics are professional mechanics who can travel to your preferred location for
                                                    the work you need. We contact mobile mechanics about all bookings, and most bookings are completed by these
                                                    mechanics.
                                                </p>
                                                <h5 class="fs-7">Garages</h5>
                                                <p>
                                                    The ClickMechanic network also includes independent vetted garages who offer a FREE collection and delivery
                                                    service.
                                                </p>
                                                <h5 class="fs-7">All providers</h5>
                                                <p>
                                                    As a reminder, all independent mechanics and garages in the network are vetted on their work history,
                                                    qualifications and trade &amp; public liability insurances. This is why they do such a great job, and our customers
                                                    love the service giving us a 4.6/5 TrustPilot score!
                                                </p>
                                                <p>
                                                    If you have any other questions about our providers feel free to try
                                                    the <a target="_blank" href="#">help centre</a>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- c-and-d-learn-more-modal -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="fs-7">Is your vehicle drivable if collected? <br>
                                            <a class="small" href="#"  data-bs-toggle="modal" data-bs-target="#safe-to-drive-info-modal">Learn more</a>
                                        </p>
                                        <!-- safe-to-drive-info-modal -->
                                        <div class="modal fade" id="safe-to-drive-info-modal" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Learn more about our different providers</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="fs-7">Mobile mechanics</h5>
                                                        <p>
                                                            ClickMechanic works with a nationwide network of independent vetted mobile mechanics, who can undertake and carry
                                                            out all repairs and services. All mechanics are professional mechanics who can travel to your preferred location for
                                                            the work you need. We contact mobile mechanics about all bookings, and most bookings are completed by these
                                                            mechanics.
                                                        </p>
                                                        <h5 class="fs-7">Garages</h5>
                                                        <p>
                                                            The ClickMechanic network also includes independent vetted garages who offer a FREE collection and delivery
                                                            service.
                                                        </p>
                                                        <h5 class="fs-7">All providers</h5>
                                                        <p>
                                                            As a reminder, all independent mechanics and garages in the network are vetted on their work history,
                                                            qualifications and trade &amp; public liability insurances. This is why they do such a great job, and our customers
                                                            love the service giving us a 4.6/5 TrustPilot score!
                                                        </p>
                                                        <p>
                                                            If you have any other questions about our providers feel free to try
                                                            the <a target="_blank" href="#">help centre</a>.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- safe-to-drive-info-modal -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-check-btn" for="booking_vehicle_drivable_true">
                                                    <input type="radio" value="true" name="booking[vehicle_drivable]" id="booking_vehicle_drivable_true">
                                                    <span class="form-check-btn-text">Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-check-btn" for="booking_vehicle_drivable_false">
                                                    <input type="radio" value="false" name="booking[vehicle_drivable]" id="booking_vehicle_drivable_false">
                                                    <span class="form-check-btn-text">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="final-step-button">
                                <input type="submit" name="commit" value="Final step" class="btn btn-secondary fs-6 fw-bold w-100" id="final-step-btn">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
