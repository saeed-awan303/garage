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
                <li class="is-complete">
                    <a href="{{route('bookingdetails')}}">3</a>
                    <p class="progress-step-context">Details</p>
                </li>
                <li class="is-current">
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
                                <div>
                                    <ul class="selling-points">
                                        <li>
                                            <img alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="20">
                                            Qualified mechanics
                                        </li>
                                        <li>
                                            <img alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="20">
                                            No hidden extras
                                        </li>
                                        <li>
                                            <img alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="20">
                                            1 year parts &amp; repairs warranty
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="basket-provide-card-selling-points">
                                <div class="fw-bold mb-3">Why provide your card details now?</div>
                                <ul class="selling-points">
                                    <li class="mb-3">
                                        <img class="me-2" alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="25">
                                        We Won't Charge You: <span>You won't pay a penny until the work is complete.</span>
                                    </li>
                                    <li class="mb-3">
                                        <img class="me-2" alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="25">
                                        Extra Protection: <span>If any issues arise after the booking it's easier to refund you.</span>
                                    </li>
                                    <li>
                                        <img class="me-2" alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="25">
                                        Free Cancellation: <span>Up to 24 hours before the booking.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="booking-details-section">
                            <div class="payment-cards">

                                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center flex-md-row-reverse mb-4">
                                        <ul class="accepted-cards mb-3 mb-md-0">
                                            <li class="credit-card visa"><span>Visa</span></li>
                                            <li class="credit-card mastercard"><span>MasterCard</span></li>
                                            <li class="credit-card amex"><span>American Express</span></li>
                                        </ul>
                                        <div class="padlock-container">
                                            <span class="text-muted">Payments securely processed by Stripe.</span>
                                        </div>
                                    </div>

                                    <div class="payment_form_wrapper" id="payment_form_wrapper">
                                        {{-- <form>
                                            <div class="row g-3 mb-3">
                                                <div class="col-12">
                                                    <div class="col-md-12">
                                                        <label for="payment_form_wrapper-name">Name on card</label>
                                                        <input type="text" class="form-control" id="payment_form_wrapper-name" name="name_on_card" placeholder="e.g. Mr John Smith">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="field">
                                                        <label for="payment-form-card-number">Card number</label>
                                                        <input type="text" class="form-control" id="card_number" name="card_number" placeholder="123456">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-6 col-md-5">
                                                    <div class="field">
                                                        <label for="payment-form-card-expiry">Expiry date</label>
                                                        <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="">
                                                        {{-- <div id="payment-form-card-expiry" class="input empty form-control"></div> --}}
                                                    {{-- </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="field">
                                                        <label for="payment-form-card-cvc">Security code</label>
                                                        <input type="text" class="form-control" id="security_code" name="security_code" placeholder="">
                                                        {{-- <div id="payment-form-card-cvc" class="input empty form-control"></div> --}}
                                                    {{-- </div>
                                                </div>
                                                <div class="col-md-3 d-none d-md-block">
                                                    <img class="mt-4" alt="" src="{{asset('assets/frontend/images/siteseal.gif')}}"/>
                                                </div>
                                            </div>

                                            <div class="d-grid mt-4">
                                                <button type="submit" class="btn btn-secondary fw-bold fs-6">Complete booking</button>
                                            </div>

                                            <div class="error" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                    <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
                                                    <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
                                                </svg>
                                                <span class="message ms-2"></span>
                                            </div>

                                        </form> --}}
                                        @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p><br>
                                        </div>
                                        @endif
                                        <form role="form" action="{{route('paymentdetails')}}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                            @csrf
                                            <div class='form-row row'>
                                            <div class='col-xs-12 col-md-6 form-group required'>
                                                <label class='control-label'>Name on Card</label>
                                                <input class='form-control' size='4' type='text' name="name_on_card">
                                            </div>
                                            <div class='col-xs-12 col-md-6 form-group required'>
                                                <label class='control-label'>Card Number</label>
                                                <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_number">
                                            </div>
                                            </div>
                                            <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label>
                                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc">
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Month</label>
                                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expiry_month">
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Year</label>
                                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="expiry_year">
                                            </div>
                                            </div>
                                            {{-- <div class='form-row row'>
                                                <div class='col-md-12 error form-group hide'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                    again.
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-row row">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                            </div>
                                            </div>
                                        </form>

                                        <div class="success">
                                            <div class="icon">
                                                <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                                                    <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                                                </svg>
                                            </div>
                                            <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
                                            <p class="message"><span data-tid="elements_examples.success.message">Thanks for trying Stripe Elements. No money was charged, but we generated a token: </span><span class="token">tok_189gMN2eZvKYlo2CwTBv9KKh</span></p>

                                            <a class="reset" href="#">
                                                <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
                                                </svg>
                                            </a>
                                        </div>

                                    </div>

                                    <p class="mt-4 small text-center text-muted">
                                        By placing your booking you agree to ClickMechanic's <br>
                                        <a target="_blank" tabindex="-1" href="#">Terms and Conditions</a>,
                                        <a target="_blank" tabindex="-1" href="#">Booking Policy</a>
                                        and
                                        <a target="_blank" tabindex="-1" href="#">Privacy Notice</a>.
                                    </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

$(function() {

    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/

    var $form = $(".require-validation");

    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }

    });

    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];

            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
@endsection
