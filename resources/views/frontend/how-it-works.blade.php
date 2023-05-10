@extends('layouts.frontend.app')
@section('main-content')
<main class="d-flex flex-column justify-content-start flex-grow-1">

    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 hero-content">
                    <h1>How does ClickMechanic work?</h1>
                    <p>We've worked hard to make sure we have a transparent service that is easy to use - have a browse through how our system works to find out more.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-5 pt-0 pt-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 p-0 px-md-3">
                    <div class="nav nav_tab_btns flex-column" onclick="if (window.innerWidth <= 767) $(this).toggleClass('open')"">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#simple" type="button">Simple booking</button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#mechanics" type="button">Vetted mechanics</button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pricing" type="button">Honest pricing</button>
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#warranty" type="button">You're covered</button>
                    </div>
                </div>
                <div class="col-md-8 mt-3 mt-md-0">
                    <div class="tab-content" id="">
                        <div class="tab-pane fade show active" id="simple">
                            <h3 class="mb-3">Get an instant fixed price and a mechanic that comes to you!</h3>

                            <p>At ClickMechanic we’re bringing trust, transparency and convenience to car repair. All our users get started with an online, industry standard, fixed price quote, which you can receive in minutes. Once you’re happy with the quote you’ll be able to book in with one of 1000s of vetted mechanics right across the UK. You’ll be able to select either for a mobile mechanic to come out to you or for a garage to collect the vehicle to undertake the work in their workshop.</p>

                            <p>No more wondering if the mechanic is ripping you off, or waiting around in a garage waiting room. It's super easy, just follow these steps:</p>

                            <ol class="mt-3">
                                <li>
                                    <p class="fw-bold">Tell us about your car</p>
                                    <p>Just enter your location and vehicle registration on the homepage. so we know which car we're fixing. Then you'll need to select the work that needs doing.</p>
                                    <p>If you're not sure what's wrong with your car, don't worry! You can either use our diagnostic tool, or book a diagnostic inspection and the mechanic will let you know.</p>
                                </li>

                                <li>
                                    <p class="fw-bold">You get an instant quote</p>
                                    <p>Then we'll put this information into our quote engine and you'll get an industry standard approved quote within seconds.</p>
                                    <p>Want to know how the price is an industry standard approved one? Take a look at our honest pricing pageto find out how we use millions of data points to get your quote.</p>
                                </li>

                                <li>
                                    <p class="fw-bold">Confirm your booking</p>
                                    <p>Let us know your preferred date, time, and location for the work to be done. To finalise your booking, you'll need to enter your bank card details into our 256-bit SSL encrypted website to be used by our secure payments provider Stripe. We won't take a penny from you until the mechanic has completed any work. It's just like a hotel reservation - we will reserve the booking amount on your card 24 hours before the booking so we can ensure the mechanic gets paid.</p>
                                </li>

                                <li>
                                    <p class="fw-bold">On the day</p>
                                    <p>Your mechanic will collect any parts they need and arrive at your chosen location within your requested arrival window. They'll introduce themselves and either take your car to the garage or get on with the work that you have selected.</p>
                                    <p>Once all work has been agreed and finished (and your car returned if it was taken to a garage), your mechanic will explain the work they carried out. Once you're happy, your securely stored bankcard will be charged through the ClickMechanic app that all of the mechanics carry on their smart phone. The invoice from your mechanic will be sent directly to your email.</p>
                                    <p>After the visit, you'll receive an email asking you to rate your mechanic. This helps us ensure our standards remain high and improve the service for the next time you use us.</p>
                                </li>
                            </ol>
                        </div>

                        <div class="tab-pane fade" id="mechanics">
                            <h3 class="mb-3">Only vetted mechanics on our network</h3>

                            <p>We hear it all the time. Stories of rogue traders and cowboy mechanics. However, when you use ClickMechanic you don't have to worry about a thing. We vet all the mechanics in the network on several criteria and recommend they have:</p>
                            <ul class="mt-3">
                                <li>At least a level 2 City and Guilds motor mechanic qualification.</li>
                                <li>Liability and trade insurance.</li>
                                <li>At least 5 years trade experience operating as a mechanic. Most of the mechanics have franchise dealer experience prior to joining the ClickMechanic network, but you'll pay a fraction of the franchise price.</li>
                            </ul>

                            <p>On top of this, we have a review system for all mechanics in the network. After each job, we ask our customers how their mechanic performed on several criteria which enables us to keep the standards high. This means you can rest assured that every single review on our websitehas come from a paying customer, unlike most other review sites that allow every man and his dog to leave one!</p>
                        </div>

                        <div class="tab-pane fade" id="pricing">
                            <h3 class="mb-3">Fair and honest pricing</h3>
                            <p>This is where we get super clever. Have you ever had the feeling that you have no idea how your mechanic is charging you and that, for all you know, they may be charging double the average repair price? You're not alone – we found 1 in 2 car owners feel the same!</p>
                            <p>At ClickMechanic, we're on a mission to make pricing quick, honest, and transparent. We've partnered with some of the world's largest providers of automotive data to give us access to millions of data points and we used these to build industry standard approved quotes for all our customers.</p>
                            <p>Our data includes vehicle repair times, regional average labour rates, and parts prices. To build a quote, we simply multiply the vehicle repair times with the regional average labour rate and then add on parts' prices. This leaves you with the peace of mind that you're not getting ripped off and the mechanics are getting the fair and honest price they deserve.</p>
                        </div>

                        <div class="tab-pane fade" id="warranty">
                            <h3 class="mb-3">We've got you covered with a 12-month warranty</h3>
                            <p>All work carried out through ClickMechanic comes with a 12-month warranty on both labour and parts. That means, if something goes wrong with the work that was undertaken or a part that was replaced within 12 months of the work being carried out, you're completely covered. Any additional work or repairs will be undertaken without any additional fee, which means you can have peace of mind when getting your car repaired.</p>
                            <p>To ensure that you're covered, make sure that all work, whether it was included in the initial quote or not, is paid for and tracked via our app. If you pay for any additional work or use the mechanic outside of the ClickMechanic system, we won't be able to cover you for anything.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section_space background_light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-5">Book a trusted mechanic today</h2>
                    <a class="btn btn-primary fw-bold btn_md" href="booking_car.html">Get started</a>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
