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
            <li class="is-current">
                <a href="#">2</a>
                <p class="progress-step-context">Select work</p>
            </li>
            <li class="@if(isset($details['booking_details'])){{"is-complete"}} @endif">
                <a href="@if(isset($details['booking_details'])) {{route('bookingdetails')}} @else {{"#"}} @endif">3</a>
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel">
                        <ul id="tabs-service-navigation-desktop" class="nav tabs-service-navigation d-none d-md-table">
                            @foreach ($services as $service)
                                <li class="nav-item @if($service->slug=='repairs'){{"active"}}@endif" data-bs-toggle="pill" data-bs-target="{{"#tab_".$service->slug}}">
                                    {{$service->title}}
                                </li>
                            @endforeach
                                <li class="nav-item @if($service->slug=='tyres'){{"active"}}@endif" data-bs-toggle="pill" data-bs-target="#tab_tyre">
                                    tyres
                                </li>
                            {{-- <li class="nav-item" data-bs-toggle="pill" data-bs-target="#tab_diagnostic">
                                Diagnostics
                            </li>
                            <li class="nav-item" data-bs-toggle="pill" data-bs-target="#tab_service">
                                Servicing & MOT
                            </li>
                            <li class="nav-item" data-bs-toggle="pill" data-bs-target="#tab_tyre">
                                Tyres
                            </li>
                            <li class="nav-item" data-bs-toggle="pill" data-bs-target="#tab_inspection">
                                Pre-purchase Inspections
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            @foreach ($services as $service)
                            <div class="tab-pane fade @if($service->slug=='repairs'){{"show active"}}@endif" id="{{"tab_".$service->slug}}">
                                @if($service->slug=='repairs')
                                    <div class="search_block_wrapper">

                                            <h3>Search for your repair</h3>

                                        <div class="search_form_wrapper">
                                            <form class="booking-work-search" action="#">
                                                <div class="form_wrap has-icon icon_search">
                                                    <input type="text" class="form-control" placeholder="Search available repairs" name="search" maxlength="100" id="repair_search">


                                                </div>
                                                <div style="background-color:white;">
                                                    <ul class="search-repairs " style="width:100%;padding-left:0px">

                                                    </ul>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                    <div class="p-3">
                                        <div class="info-panel">
                                            Not sure what you need? <a href="#">Get a free consultation from our mechanics-in-residence</a>.
                                        </div>
                                    </div>

                                    <div class="block_wrapper">
                                        <h3 class="m-3">Choose from popular repairs</h3>
                                        <div id="popular-repairs">
                                            @foreach ($service->category as $category)
                                                <!-- item row start -->
                                            <div class="repair-item-row">
                                                <div class="d-table w-100">
                                                    <div class="d-table-cell align-top" style="width: 40px">
                                                        @if (isset($details['categories']) && in_array($category->id,json_decode($details['categories'])))
                                                            <button class="btn_add_item remove_category" data-id='{{$category->id}}' data-slug='{{$category->slug}}' data-price='{{$category->price}}' data-title='{{$category->title}}'>
                                                                <img alt="" src="{{asset('assets/frontend/images/icon_remove.svg')}}"/>
                                                            </button>
                                                        @else
                                                            <button class="btn_add_item append_category" data-id='{{$category->id}}' data-slug='{{$category->slug}}' data-price='{{$category->price}}' data-title='{{$category->title}}'>
                                                                <img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>
                                                            </button>
                                                        @endif

                                                    </div>
                                                    <div class="d-table-cell align-middle pe-3">
                                                        {{$category->title}}
                                                        <p class="repair-item-extra-description"><small class="text-muted">{{$category->slug}}</small></p>
                                                    </div>
                                                    <div class="d-table-cell align-middle text-end">
                                                        <a href="#" class="btn-more-info" data-bs-toggle="modal" data-bs-target="#modal_repair_1">More info</a>
                                                    </div>
                                                </div>
                                                <!-- Modal more info start -->
                                                <div class="modal fade" id="modal_repair_1" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">Clutch replacement</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4 class="text_primary">What is included?</h4>
                                                                <ul>
                                                                    <li>Parts &amp; Labour (unless stated)</li>
                                                                    <li>VAT (if applicable)</li>
                                                                    <li>FREE call out (to your home or office)</li>
                                                                    <li>12 month warranty on parts &amp; labour</li>
                                                                </ul>
                                                                <h4 class="text_primary">What happens?</h4>
                                                                <p>Much of the process to change a clutch is vehicle specific, however there are a few standard steps. The mechanic will:</p>
                                                                <ul>
                                                                    <li>Raise the vehicle</li>
                                                                    <li>Split the gearbox from the engine</li>
                                                                    <li>Remove the old clutch unit</li>
                                                                    <li>Fit a new clutch kit</li>
                                                                    <li>Put everything back together</li>
                                                                    <li>Road test the vehicle</li>
                                                                </ul>
                                                                <h4 class="text_primary">What are the symptoms?</h4>
                                                                <ul>
                                                                    <li>The engine speed will rise up rapidly, but you do not go any faster, especially up hill or under hard acceleration</li>
                                                                    <li>You notice an almost electrical sweet burning smell inside the car</li>
                                                                    <li>You can engage a gear when the engine is off, but not when it is running</li>
                                                                    <li>The clutch pedal biting point (this is the point when you feel the vehicle moving from stationary for example) has become much higher up in the pedal travel</li>
                                                                    <li>You start to find it harder to move between gears and can often hear a crunch as you do so</li>
                                                                </ul>
                                                                <h4 class="text_primary">Notes</h4>
                                                                <ul>
                                                                    <li>The clutch disc is simply put a 'friction' disc that, when active, presses against the flywheel (which is directly connected to the crankshaft) by way of the pressure plate.</li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button class="btn btn-primary w-100">Add to basket</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal more info end -->
                                            </div>
                                            <!-- item row end -->
                                            @endforeach


                                        </div>

                                        <div class="browse-by-category">
                                            <div class="accordion">
                                                <div class="accordion-item">
                                                    <button class="accordion-button collapsed" data-bs-target="#browse_by_category" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                                        <span class="accordion_title">Or browse by category</span>
                                                    </button>
                                                    <div id="browse_by_category" class="accordion-collapse collapse">
                                                        <div class="accordion-body">

                                                            <div class="accordion">
                                                                @foreach ($categories as $category)
                                                                    <!-- category item row start -->
                                                                <div class="accordion-item">
                                                                    <button class="accordion-button collapsed" data-bs-target="#browse_by_category_1" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                                                        <span class="accordion_title">{{$category->title}}</span>
                                                                    </button>
                                                                    <div id="browse_by_category_1" class="accordion-collapse collapse">
                                                                        @foreach ($category->children as $children)
                                                                        <div class="accordion-body">
                                                                            <div class="list-divider">{{$children->title}}</div>
                                                                            @foreach ($children->services as $childservice)
                                                                                <!-- item row start -->
                                                                            <div class="repair-item-row">
                                                                                <div class="d-table w-100">
                                                                                    <div class="d-table-cell align-top" style="width: 40px">
                                                                                        <button class="btn_add_item">
                                                                                            <img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="d-table-cell align-middle pe-3">
                                                                                        {{-- {{$childservice->title}} --}}
                                                                                    </div>
                                                                                    <div class="d-table-cell align-middle text-end">
                                                                                        <a href="#" class="btn-more-info" data-bs-toggle="modal" data-bs-target="#modal_repair_category_1_1">More info</a>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Modal more info start -->
                                                                                <div class="modal fade" id="modal_repair_category_1_1" tabindex="-1" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h1 class="modal-title">Brake discs and pads replacement</h1>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <ul class="nav nav-tabs nav-tabs-2 d-table w-100 mb-4">
                                                                                                    <li class="nav-item d-table-cell">
                                                                                                        <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#modal_repair_category_1_1_options" type="button" aria-selected="false">
                                                                                                            Options
                                                                                                        </button>
                                                                                                    </li>
                                                                                                    <li class="nav-item d-table-cell">
                                                                                                        <button class="nav-link active w-100" data-bs-toggle="tab" data-bs-target="#modal_repair_category_1_1_more_info" type="button" aria-selected="true">
                                                                                                            More Info
                                                                                                        </button>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <div class="tab-content">
                                                                                                    <div class="tab-pane fade" id="modal_repair_category_1_1_options">
                                                                                                        <div class="tab-content-body">
                                                                                                            <p>Please select the option(s) you need below:</p>
                                                                                                            <!-- item row start -->
                                                                                                            <div class="repair-item-row">
                                                                                                                <div class="d-table w-100">
                                                                                                                    <div class="d-table-cell align-top" style="width: 40px">
                                                                                                                        <button class="btn_add_item">
                                                                                                                            <img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="d-table-cell align-middle pe-3">
                                                                                                                        Brake discs and pads replacement - front (both)
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- item row end -->
                                                                                                            <!-- item row start -->
                                                                                                            <div class="repair-item-row">
                                                                                                                <div class="d-table w-100">
                                                                                                                    <div class="d-table-cell align-top" style="width: 40px">
                                                                                                                        <button class="btn_add_item">
                                                                                                                            <img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="d-table-cell align-middle pe-3">
                                                                                                                        Brake discs and pads replacement - rear (both)
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- item row end -->
                                                                                                        </div>
                                                                                                        <button type="button" class="btn w-100 mt-4" data-bs-dismiss="modal"">Close</button>
                                                                                                    </div>
                                                                                                    <div class="tab-pane fade show active" id="modal_repair_category_1_1_more_info">
                                                                                                        <div class="tab-content-body">
                                                                                                            <h4 class="text_primary">What is included?</h4>
                                                                                                            <ul>
                                                                                                                <li>Parts &amp; Labour (unless stated)</li>
                                                                                                                <li>VAT (if applicable)</li>
                                                                                                                <li>FREE call out (to your home or office)</li>
                                                                                                                <li>12 month warranty on parts &amp; labour</li>
                                                                                                            </ul>

                                                                                                            <h4 class="text_primary">What happens? *</h4>
                                                                                                            <ul>
                                                                                                                <li>Mechanic will inspect the brake discs.</li>
                                                                                                                <li>Brake discs will be replaced, if damaged or worn.</li>
                                                                                                                <li>Mechanic will advise if the brake pads need replacing.</li>
                                                                                                                <li>Mechanic will take car for test drive and checks brake system.</li>
                                                                                                                <li>Mechanic will make any adjustments to optimise the brake system.</li>
                                                                                                            </ul>

                                                                                                            <h4 class="text_primary">What are the symptoms?</h4>
                                                                                                            <ul>
                                                                                                                <li>Brake discs vibrate under braking.</li>
                                                                                                                <li>Car pulls to one side under braking.</li>
                                                                                                                <li>Disc surface is not smooth; if it displays grooves, spots or even cracks.</li>
                                                                                                                <li>Disc surface has a blue discolourisation.</li>
                                                                                                            </ul>

                                                                                                            <h4 class="text_primary">Notes</h4>
                                                                                                            <ul>
                                                                                                                <li>A brake disc is a metal disc that is part of a disc brake unit mounted inside the wheel, when you apply the brakes, the brake pad is forced onto the brake disc causing friction, in turn slowing the car down.</li>
                                                                                                            </ul>
                                                                                                            <div class="info-panel mt-4 mb-2">
                                                                                                                * This is the ClickMechanic recommended procedure, however some mechanics may use different procedures according to their training and knowledge of the car.
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <button type="button" class="btn w-100 mt-4" data-bs-dismiss="modal"">Close</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer justify-content-center">
                                                                                                <p>Didn't find what you need? Try viewing our Help Centre or drop us an email at <a href="mailto:support@clickmechanic.com">support@clickmechanic.com</a> and our friendly customer service team will be happy to help.</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Modal more info end -->
                                                                            </div>
                                                                            <!-- item row end -->
                                                                            @endforeach

                                                                        </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                                <!-- category item row end -->
                                                                @endforeach



                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3">
                                            <div class="info-panel">
                                                Unsure what's wrong with your car? <a href="#">Add a diagnostic</a>.
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($service->slug=='diagnostics')
                                    {{-- <div class="tab-pane-block">
                                        <h4 class="text-uppercase mb-2 text_primary">Free diagnostic service</h4>
                                        <p>Our in-house mechanics will help diagnose the problem and find the right service for you. Simply <a target="_blank" href="#">fill in this form</a>.</p>
                                        <div class="text-center mt-5 pb-4">
                                            <a target="_blank" class="btn btn-primary" href="#">Get Free Support</a>
                                        </div>
                                    </div> --}}
                                    <div class="tab-pane-block">
                                        <h4 class="text-uppercase mb-2 text_primary">IN-PERSON DIAGNOSTIC</h4>
                                        <p>Get a mechanic to diagnose the issue and give you a no-obligation quote for any required repairs.</p>
                                    </div>
                                @endif
                                @if($service->slug!='repairs')
                                    <ul class="services-list">
                                        @foreach ($service->category as $category)
                                        <!-- services item start -->
                                        <li class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                            <div class="services-list-info">
                                                <h3 class="services-list-title">{{$category->title}}</h3>
                                                <div class="services-list-price">
                                                    <span class="services-list-price-value">{{"£".$category->price}}</span>
                                                </div>
                                                @if($service->slug=='diagnostics')
                                                <div class="d-flex mt-2">
                                                    <div class="local-mechanics-rating fiveStar-rating-wrapper">
                                                        <div class="fiveStar-rating" rating="5" style="width: 94px;"></div>
                                                    </div>
                                                    <a href="#" class="text-muted small ms-2">9657 reviews</a>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                                <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_1">More info</a>
                                                <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_1">More info</a>
                                                @if (isset($details['categories']) && in_array($category->id,json_decode($details['categories'])))
                                                    <button class="btn btn-danger ms-lg-3 remove_category" data-id='{{$category->id}}' data-slug='{{$category->slug}}' data-price='{{$category->price}}' data-title='{{$category->title}}'>
                                                        <span style="color:white">Remove</span>
                                                    </button>
                                                @else
                                                    <button class="btn btn-primary ms-lg-3 append_category" data-id='{{$category->id}}' data-slug='{{$category->title}}' data-price='{{$category->price}}' data-title='{{$category->title}}'>
                                                        <span>Add</span>
                                                    </button>
                                                @endif

                                            </div>
                                            <!-- Modal more info start -->
                                            <div class="modal fade" id="modal_diagnostic_1" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title">Diagnostic Inspection</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Our mechanics can carry out a wide range of mechanical inspections and plug-in diagnostics, and as such, we can help find almost any fault. </p>
                                                            <p>If you are unsure what the issue is we recommend booking an inspection through ClickMechanic to find the problem and get your car going again.</p>
                                                            <h4 class="text_primary">What happens next *</h4>
                                                            <p>The mechanic will come out to inspect the car and diagnose the problem. If there is a minor issue, the mechanic will endeavour to carry out any small fixes in the labour time quoted initially (the price of the inspection does not include any additional parts that may be necessary to fix the problem). Should there be any bigger problems, the mechanic will provide you with a quote for the work and parts necessary to repair the problem. If you accept the quote, the mechanic will order the parts and arrange for a time to repair.</p>
                                                            <div class="info-panel mt-3">* This is the ClickMechanic recommended procedure, however some mechanics may use different procedures according to their training and knowledge of the car.</div>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button class="btn btn-primary w-100">Add to basket</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal more info end -->
                                        </li>
                                        <!-- services item end -->
                                        @endforeach


                                    </ul>
                                @endif
                                @if ($service->slug=='servicing-mot')
                                    <div class="table-responsive">
                                        {{-- <table class="table align-middle mb-0">
                                            <tbody>
                                                <tr class="group table-light">
                                                    <th>Compare</th>
                                                    <th class="text-center">Interim</th>
                                                    <th class="text-center">Full</th>
                                                    <th class="text-center">Major</th>
                                                </tr>
                                                <tr>
                                                    <td>Number of checks</td>
                                                    <td class="text-center"><strong>25</strong></td>
                                                    <td class="text-center"><strong>43</strong></td>
                                                    <td class="text-center"><strong>44</strong></td>
                                                </tr>
                                                <tr class="group table-light">
                                                    <th colspan="4">Parts included</th>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Oil Filter</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Air Filter</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Pollen Filter *</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Spark Plugs **</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Fuel Filter ***</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr class="group table-light">
                                                    <td colspan="4">Top-ups included</td>
                                                </tr>
                                                <tr>
                                                    <td>Screen Wash</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Antifreeze</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Brake Fluid</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Power Steering Fluid</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Battery Fluid</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Transfer Box Oil</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Manual Trans. Oil</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center"><span class="price-value">£161.38</span></td>
                                                    <td class="text-center"><span class="price-value">£177.78</span></td>
                                                    <td class="text-center"><span class="price-value">£197.27</span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                    <button class="btn btn-primary">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                    <button class="btn btn-primary">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                    <button class="btn btn-primary">Add</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </div>
                                @endif
                                @if ($service->slug=='pre-purchase-inspections')
                                    <div class="table-responsive">
                                        {{-- <table class="table align-middle mb-0">
                                            <tbody>
                                                <tr class="group table-light">
                                                    <th>Compare</th>
                                                    <th class="text-center">Basic</th>
                                                    <th class="text-center">Standard</th>
                                                    <th class="text-center">Premium</th>
                                                </tr>
                                                <tr>
                                                    <td>Number of checks</td>
                                                    <td class="text-center"><strong>72</strong></td>
                                                    <td class="text-center"><strong>105</strong></td>
                                                    <td class="text-center"><strong>143</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Emailed report</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Road test (10 min)</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Follow-up call</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Plug in check</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Photos</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Price</strong></td>
                                                    <td class="text-center"><span class="price-value"><strong>£86.44</strong></span></td>
                                                    <td class="text-center"><span class="price-value"><strong>£104.00</strong></span></td>
                                                    <td class="text-center"><span class="price-value"><strong>£146.38</strong></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary w-100">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary w-100">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary w-100">Add</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </div>
                                @endif
                            </div>
                            @endforeach
                            <div class="tab-pane fade" id="tab_tyre">
                                <div class="tab-pane-block">
                                    <h4 class="text-uppercase mb-2 text_primary">How many tyres do you need?</h4>
                                    <p>Please select the number of tyres you want fitted, you can change this later.</p>
                                </div>
                                <div class="tyres-select">
                                    <div class="row" id="tyres_quantity">
                                        <div class="col-md-6">
                                            <p class="text-center fw-bold mb-3">Front</p>
                                            <label class="form-check-btn" for="tyres_quantity_front_1">
                                                <input type="radio" value="1" name="tyres_quantity_front" id="tyres_quantity_front_1">
                                                <span class="form-check-btn-text">1</span>
                                            </label>
                                            <label class="form-check-btn" for="tyres_quantity_front_2">
                                                <input type="radio" value="2" name="tyres_quantity_front" id="tyres_quantity_front_2">
                                                <span class="form-check-btn-text">2</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-center fw-bold mb-3">Rear</p>
                                            <label class="form-check-btn" for="tyres_quantity_rear_1">
                                                <input type="radio" value="1" name="tyres_quantity_rear" id="tyres_quantity_rear_1">
                                                <span class="form-check-btn-text">1</span>
                                            </label>
                                            <label class="form-check-btn" for="tyres_quantity_rear_2">
                                                <input type="radio" value="2" name="tyres_quantity_rear" id="tyres_quantity_rear_2">
                                                <span class="form-check-btn-text">2</span>
                                            </label>
                                        </div>
                                        <div class="offset-md-6 col-md-6">
                                            <li  data-bs-toggle="pill"  style="float:right"class="btn btn-primary" id="tyres_quantity_btn">Continue</li>
                                        </div>
                                    </div>
                                    <div class="row" style="display:none" id="tyres_size">

                                                <div class="col-12">
                                                    <div class="tyres-explanation">
                                                        <h4 class="header">Select your tyre size:</h4>
                                                        <p>We recommend that you check the tyre size on your vehicle before selecting an option.</p>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <select name="" id="tyre_width" class="form-control">
                                                        <option value="">width</option>
                                                        @foreach($tyrewidths as $width)
                                                            <option value="{{$width->id}}">{{$width->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="" id="tyre_profile" class="form-control">
                                                        <option value="">Profile</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="" id="tyre_rim" class="form-control">
                                                        <option value="">Rim</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="" id="tyre_speed" class="form-control">
                                                        <option value="">Speed</option>
                                                    </select>
                                                </div>
                                                <div class="offset-md-6 col-md-6 mt-3">
                                                    <li    style="float:right"class="btn btn-primary" id="get_tyres_btn">Continue</li>
                                                    <li    style="float:right"class="btn btn-primary mx-2" id="get_tyres_back_btn">Back</li>
                                                </div>

                                    </div>
                                    <div class="row" id="tyres_list">



                                    </div>
                                </div>
                            </div>

                            {{-- <div class="tab-pane fade" id="tab_diagnostic">
                                <div class="tab-pane-block">
                                    <h4 class="text-uppercase mb-2 text_primary">Free diagnostic service</h4>
                                    <p>Our in-house mechanics will help diagnose the problem and find the right service for you. Simply <a target="_blank" href="#">fill in this form</a>.</p>
                                    <div class="text-center mt-5 pb-4">
                                        <a target="_blank" class="btn btn-primary" href="#">Get Free Support</a>
                                    </div>
                                </div>
                                <div class="tab-pane-block">
                                    <h4 class="text-uppercase mb-2 text_primary">IN-PERSON DIAGNOSTIC</h4>
                                    <p>Get a mechanic to diagnose the issue and give you a no-obligation quote for any required repairs.</p>
                                </div>
                                <ul class="services-list">
                                    <!-- services item start -->
                                    <li class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Diagnostic Inspection</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£66.39</span>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <div class="local-mechanics-rating fiveStar-rating-wrapper">
                                                    <div class="fiveStar-rating" rating="5" style="width: 94px;"></div>
                                                </div>
                                                <a href="#" class="text-muted small ms-2">9657 reviews</a>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_1">More info</a>
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_1">More info</a>
                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_diagnostic_1" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Diagnostic Inspection</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Our mechanics can carry out a wide range of mechanical inspections and plug-in diagnostics, and as such, we can help find almost any fault. </p>
                                                        <p>If you are unsure what the issue is we recommend booking an inspection through ClickMechanic to find the problem and get your car going again.</p>
                                                        <h4 class="text_primary">What happens next *</h4>
                                                        <p>The mechanic will come out to inspect the car and diagnose the problem. If there is a minor issue, the mechanic will endeavour to carry out any small fixes in the labour time quoted initially (the price of the inspection does not include any additional parts that may be necessary to fix the problem). Should there be any bigger problems, the mechanic will provide you with a quote for the work and parts necessary to repair the problem. If you accept the quote, the mechanic will order the parts and arrange for a time to repair.</p>
                                                        <div class="info-panel mt-3">* This is the ClickMechanic recommended procedure, however some mechanics may use different procedures according to their training and knowledge of the car.</div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </li>
                                    <!-- services item end -->
                                    <!-- services item start -->
                                    <li class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Car Won't Start Inspection</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£66.39</span>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <div class="local-mechanics-rating fiveStar-rating-wrapper">
                                                    <div class="fiveStar-rating" rating="5" style="width: 94px;"></div>
                                                </div>
                                                <a href="#" class="text-muted small ms-2">4435 reviews</a>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_2">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_2">More info</a>

                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_diagnostic_2" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Car Won't Start Inspection</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>The mechanics in our network can carry out a wide range of mechanical inspections and plug-in diagnostics to establish why the vehicle is not starting. They will use their experience to select the most suitable checks given the vehicle's specific symptoms, which may include checks on the fuel, ignition, electrical and mechanical components of the engine or its supporting systems.</p>
                                                        <p>Please note that our mechanics are not equipped to diagnose or repair immobiliser/security issues, remote locking issues, or ECU software faults. We recommend taking these to a manufacturer dealership.</p>
                                                        <h4 class="text_primary">What happens next *</h4>
                                                        <p>The mechanic will come out to inspect the car to diagnose why it isn't starting. If there is a minor issue the mechanic will endeavour to carry out any small fixes in the labour time quoted initially (the price of the inspection does not include any additional parts that may be necessary to fix the problem). Should there be any bigger problems the mechanic will provide you with a quote for the work and parts necessary to repair the problem. If you accept the quote the mechanic will order the parts and arrange for a time to carry out the repair.</p>
                                                        <div class="info-panel mt-3">* This is the ClickMechanic recommended procedure, however some mechanics may use different procedures according to their training and knowledge of the car.</div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </li>
                                    <!-- services item end -->
                                    <!-- services item start -->
                                    <li class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Plug-in Diagnostic Inspection</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£66.39</span>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <div class="local-mechanics-rating fiveStar-rating-wrapper">
                                                    <div class="fiveStar-rating" rating="5" style="width: 94px;"></div>
                                                </div>
                                                <a href="#" class="text-muted small ms-2">2177 reviews</a>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_3">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_diagnostic_3">More info</a>

                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_diagnostic_3" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Plug-in Diagnostic Inspection</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Our mechanics are equipped with diagnostic tools (also known as diagnostic machines) which plug into your vehicle and allow them to read information from the engine management systems. Most commonly they will find 'fault codes' which the car stores when it detects a fault or defect somewhere in the car, however they can often read other information too.</p>
                                                        <h4 class="text_primary">What happens next *</h4>
                                                        <p>The mechanic will inspect the car's management systems to find if there are any fault codes that are causing warning lights to show or that might indicate problems with the vehicle. Upon further inspection the mechanic will provide you with a quote for the work and parts necessary to repair the problem. If you accept the quote the mechanic will order the parts and arrange for a time to carry out the repair. If there is a minor issue the mechanic will endeavour to carry out any small fixes in the labour time quoted initially (the price of the inspection does not include any additional parts or inspection time that may be necessary).</p>
                                                        <div class="info-panel mt-3">* This is the ClickMechanic recommended procedure, however some mechanics may use different procedures according to their training and knowledge of the car.</div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </li>
                                    <!-- services item end -->
                                </ul>
                                <div class="p-3 border-top">
                                    <div class="info-panel">
                                        Unsure what's wrong with your car? <a href="#">Add a diagnostic</a>.
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_service">
                                <div class="services-list">
                                    <!-- services item start -->
                                    <div class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">MOT with collection & delivery</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£74.00</span>
                                                <div class="label pricing-message">
                                                    Only £19 when booked with a service
                                                </div>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_service_1">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_service_1">More info</a>
                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_service_1" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">MOT with collection & delivery</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>A required annual test that checks your vehicles emissions, roadworthiness and safety. An MOT test must be carried out at an approved MOT test centre. Your mechanic will collect and return your car as part of their service.</p>
                                                        <p>Please be aware that since May 2018 it is illegal for a vehicle that fails its MOT with a 'dangerous' defect to leave the test premises until fixed.</p>
                                                        <h4 class="text_primary">Only £19 when booked with any service</h4>

                                                        <button type="button" class="btn w-100 fw-bold my-3" data-bs-toggle="collapse" data-bs-target="#modal_service_1_schedule">View service schedule</button>
                                                        <div id="modal_service_1_schedule" class="collapse">
                                                            <table class="table align-middle table-hover">
                                                                <tbody>
                                                                    <tr class="group table-light">
                                                                        <th class="text-left">Pre-Engine Checks</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check timing belt replacement interval</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check for damage to bodywork, lamps, trims and oil leaks</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check condition and operation of all seat belts</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation of interior and exterior lights</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation of ABS and air bag warning lights</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check windscreen washers and wipers</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check air conditioning operation including bad odour</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check horn</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation of suspension dampers</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Lubricate all door hinges, locks, and bonnet catches</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check fuel cap</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr class="group table-light">
                                                                        <th class="text-left">Under the Bonnet</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check cooling system including fan operation</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and record antifreeze protection</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and record brake fluid condition</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check power steering operation and fluid condition</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and top up all under bonnet fluid levels</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check all auxiliary drive belts (not timing belt)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check engine breather system</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check vacuum pipes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check throttle body</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check battery level and lubricate terminals</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check condition of spark plugs (petrol only)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Replace spark plugs (petrol only)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Replace air filter</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Replace pollen filter</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr class="group table-light">
                                                                        <th class="text-left">Vehicle Raised</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Change oil, filter and fit new sump plug washer</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check fuel lines and brake pipes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check the condition and security of the exhaust</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check all steering and suspension joints, mountings and gaiters</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Carry out tyre report</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check all wheel bearings for excessive ‘play’ and noise</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check CV gaiters and joints for wear or splits</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation and condition of disc brakes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Carry out brake report</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and top up axle and transfer box oil levels</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and top up gearbox oil level</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check clutch cable/cylinder</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Grease all greasing points</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check rear drum brakes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr class="group table-light">
                                                                        <th class="text-left">Vehicle Lowered</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Torque wheel nuts/studs / Locking wheel nut key location</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr class="group table-light">
                                                                        <th class="text-left">Final Checks</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Road test vehicle and report any findings</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Re-check engine oil level</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Ensure all upholstery, gear lever, steering wheel, etc are clean</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Stamp service book(s)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Reset service interval indicator<span class="symbol-sans-serif">†</span></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </div>
                                    <!-- services item end -->
                                    <!-- services item start -->
                                    <div class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Major Service</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£232.32</span>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_service_2">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_service_2">More info</a>
                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_service_2" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Major Service</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li> 45-point maintenance check </li>
                                                            <li> Includes new engine oil, oil filter, air filter, spark plugs (petrol only), fuel filter (diesel only) and pollen/cabin filter (if fitted) </li>
                                                            <li> Includes top-ups for screen wash &amp; antifreeze, brake fluid, power steering fluid, battery fluid, transfer box oil and manual transmission oil </li>
                                                        </ul>
                                                        <h4 class="text_primary">MOT only £19 when booked with any service</h4>

                                                        <button type="button" class="btn w-100 fw-bold my-3" data-bs-toggle="collapse" data-bs-target="#modal_service_2_schedule">View service schedule</button>
                                                        <div id="modal_service_2_schedule" class="collapse">
                                                            <table class="table align-middle table-hover">
                                                                <tbody>
                                                                    <tr class="group">
                                                                        <th class="text-left">Pre-Engine Checks</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check timing belt replacement interval</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check for damage to bodywork, lamps, trims and oil leaks</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check condition and operation of all seat belts</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation of interior and exterior lights</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation of ABS and air bag warning lights</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check windscreen washers and wipers</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check air conditioning operation including bad odour</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check horn</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation of suspension dampers</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Lubricate all door hinges, locks, and bonnet catches</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check fuel cap</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr class="group">
                                                                        <th class="text-left">Under the Bonnet</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check cooling system including fan operation</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and record antifreeze protection</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and record brake fluid condition</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check power steering operation and fluid condition</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and top up all under bonnet fluid levels</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check all auxiliary drive belts (not timing belt)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check engine breather system</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check vacuum pipes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check throttle body</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check battery level and lubricate terminals</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check condition of spark plugs (petrol only)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Replace spark plugs (petrol only)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Replace air filter</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Replace pollen filter</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                  <tr class="group">
                                                                        <th class="text-left">Vehicle Raised</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                  </tr>
                                                                    <tr>
                                                                        <td class="item">Change oil, filter and fit new sump plug washer</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check fuel lines and brake pipes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check the condition and security of the exhaust</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                         <td class="item">Check all steering and suspension joints, mountings and gaiters</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Carry out tyre report</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check all wheel bearings for excessive ‘play’ and noise</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check CV gaiters and joints for wear or splits</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check operation and condition of disc brakes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Carry out brake report</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and top up axle and transfer box oil levels</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check and top up gearbox oil level</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check clutch cable/cylinder</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Grease all greasing points</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Check rear drum brakes</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                  <tr class="group">
                                                                        <th class="text-left">Vehicle Lowered</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                  </tr>
                                                                    <tr>
                                                                        <td class="item">Torque wheel nuts/studs / Locking wheel nut key location</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                  <tr class="group">
                                                                        <th class="text-left">Final Checks</th>
                                                                        <th class="text-center">Interim</th>
                                                                        <th class="text-center">Full</th>
                                                                        <th class="text-center">Major</th>
                                                                  </tr>
                                                                    <tr>
                                                                        <td class="item">Road test vehicle and report any findings</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Re-check engine oil level</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Ensure all upholstery, gear lever, steering wheel, etc are clean</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Stamp service book(s)</td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Reset service interval indicator<span class="symbol-sans-serif">†</span></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                        <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                                    </tr>
                                                              </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </div>
                                    <!-- services item end -->
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <tbody>
                                                <tr class="group table-light">
                                                    <th>Compare</th>
                                                    <th class="text-center">Interim</th>
                                                    <th class="text-center">Full</th>
                                                    <th class="text-center">Major</th>
                                                </tr>
                                                <tr>
                                                    <td>Number of checks</td>
                                                    <td class="text-center"><strong>25</strong></td>
                                                    <td class="text-center"><strong>43</strong></td>
                                                    <td class="text-center"><strong>44</strong></td>
                                                </tr>
                                                <tr class="group table-light">
                                                    <th colspan="4">Parts included</th>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Oil Filter</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Air Filter</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Pollen Filter *</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Spark Plugs **</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Fuel Filter ***</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr class="group table-light">
                                                    <td colspan="4">Top-ups included</td>
                                                </tr>
                                                <tr>
                                                    <td>Screen Wash</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Antifreeze</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Brake Fluid</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Power Steering Fluid</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Battery Fluid</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Transfer Box Oil</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Manual Trans. Oil</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center"><span class="price-value">£161.38</span></td>
                                                    <td class="text-center"><span class="price-value">£177.78</span></td>
                                                    <td class="text-center"><span class="price-value">£197.27</span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                    <button class="btn btn-primary">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                    <button class="btn btn-primary">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                    <button class="btn btn-primary">Add</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="p-3">
                                        <div class="info-panel">
                                            <div>* If fitted</div>
                                            <div>** Petrol only</div>
                                            <div>*** Diesel only</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_inspection">
                                <div class="services-list">
                                    <!-- services item start -->
                                    <div class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Premium Pre-purchase Inspection</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£146.38</span>
                                                <span class="text-muted fw-normal small">
                                                    RAC price: <span class="text-decoration-line-through">£239.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_inspection_1">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_inspection_1">More info</a>
                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_inspection_1" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Premium Pre-purchase Inspection</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text_primary">Includes:</h4>
                                                        <ul>
                                                            <li>143-point mechanical and structural inspection</li>
                                                            <li>Road test</li>
                                                            <li>Vehicle report emailed to you</li>
                                                            <li>Full interior, bodywork and paint inspection</li>
                                                            <li>Free phone consultation with the mechanic afterwards</li>
                                                            <li>Vehicle raised to conduct more thorough inspections</li>
                                                            <li>Plug-in diagnostic check</li>
                                                            <li>Photos included in the report</li>
                                                            <li>Please note: we are unable to inspect vehicles written off by insurance, motor homes over 7.5t or imported vehicles</li>
                                                        </ul>
                                                        <button type="button" class="btn w-100 fw-bold my-3" data-bs-toggle="collapse" data-bs-target="#modal_inspection_1_checklist">View our checklist</button>
                                                        <div id="modal_inspection_1_checklist" class="collapse">
                                                            <table class="table checklist-table align-middle table-hover">
                                                                <tbody>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Interior compartment</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Door locking</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Boot/tailgate lock</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Door seals &amp; hinges</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Interior sills</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Illuminating lights</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Seat upholstery</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Seat mechanism (front seats)</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Suspension arms/fixings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Tie bars/anti roll bars</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Bushes</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Brake hydraulics</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Master cylinder security (if accessible)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Fluid leaks</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Servo/power system</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Flexible hoses</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Pipes/connections</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Clutch and transmission</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Fluid/oil leaks</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Hydraulic system</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Linkage wear (manual)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Casings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Mountings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Drive shaft assemblies</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Sliding joints (if visible)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Slave cylinder gaiter/boot (manual)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Propshaft(s)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Bearings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Clutch pedal/cable adjustment</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Underside condition</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Chassis members</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Sub frames/mountings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Corrosion - floor/chassis</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Corrosion protection</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Engine underside leakage</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Fuel system</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Tank fixings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Fuel lines</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Breather pipes</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td class="item">Evidence of leaks</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Exhaust system</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                    <td class="item">Operation</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td class="item">System condition</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </div>
                                    <!-- services item end -->
                                    <!-- services item start -->
                                    <div class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Standard Pre-purchase Inspection</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£104.00</span>
                                                <span class="text-muted fw-normal small">
                                                    RAC price: <span class="text-decoration-line-through">£189.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_inspection_2">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_inspection_2">More info</a>
                                            <button class="btn btn-primary btn-red ms-lg-3">
                                                <span>Remove</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_inspection_2" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Standard Pre-purchase Inspection</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text_primary">Includes:</h4>
                                                        <ul>
                                                            <li>105-point mechanical and structural inspection</li>
                                                            <li>Road test</li>
                                                            <li>Vehicle report emailed to you</li>
                                                            <li>Bodywork inspection</li>
                                                            <li>Free phone consultation with the mechanic afterwards</li>
                                                            <li>Please note: we are unable to inspect vehicles written off by insurance, motor homes over 7.5t or imported vehicles</li>
                                                        </ul>
                                                        <button type="button" class="btn w-100 fw-bold my-3" data-bs-toggle="collapse" data-bs-target="#modal_inspection_2_checklist">View our checklist</button>
                                                        <div id="modal_inspection_2_checklist" class="collapse">
                                                            <table class="table checklist-table align-middle table-hover">
                                                                <tbody>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Interior compartment</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Door locking</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Boot/tailgate lock</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Door seals &amp; hinges</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Interior sills</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Illuminating lights</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Seat upholstery</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Seat mechanism (front seats)</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Suspension arms/fixings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Tie bars/anti roll bars</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Bushes</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Brake hydraulics</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Master cylinder security (if accessible)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Fluid leaks</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Servo/power system</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Flexible hoses</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Pipes/connections</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary btn-red w-100">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </div>
                                    <!-- services item end -->
                                    <!-- services item start -->
                                    <div class="services-list-item d-flex flex-column flex-lg-row justify-content-md-between">
                                        <div class="services-list-info">
                                            <h3 class="services-list-title">Basic Pre-purchase Inspection</h3>
                                            <div class="services-list-price">
                                                <span class="services-list-price-value">£86.44 </span>
                                                <span class="text-muted fw-normal small">
                                                    RAC price: <span class="text-decoration-line-through">£99.00</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="services-list-buttons d-flex justify-content-between d-lg-block mt-3 mt-lg-0">
                                            <!-- for desktop -->
                                            <a href="#" class="btn-more-info d-none d-lg-inline-block" data-bs-toggle="modal" data-bs-target="#modal_inspection_3">More info</a>
                                            <!-- for mobile -->
                                            <a href="#" class="btn btn-more-info d-lg-none d-inline-block" data-bs-toggle="modal" data-bs-target="#modal_inspection_3">More info</a>
                                            <button class="btn btn-primary ms-lg-3">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        <!-- Modal more info start -->
                                        <div class="modal fade" id="modal_inspection_3" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title">Basic Pre-purchase Inspection</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text_primary">Includes:</h4>
                                                        <ul>
                                                            <li>72-point mechanical and structural inspection</li>
                                                            <li>Road test</li>
                                                            <li>Vehicle report emailed to you</li>
                                                            <li>Please note: we are unable to inspect vehicles written off by insurance, motor homes over 7.5t or imported vehicles</li>
                                                        </ul>
                                                        <button type="button" class="btn w-100 fw-bold my-3" data-bs-toggle="collapse" data-bs-target="#modal_inspection_3_checklist">View our checklist</button>
                                                        <div id="modal_inspection_3_checklist" class="collapse">
                                                            <table class="table checklist-table align-middle table-hover">
                                                                <tbody>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Interior compartment</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Door locking</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Boot/tailgate lock</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Door seals &amp; hinges</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Interior sills</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Illuminating lights</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Seat upholstery</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Seat mechanism (front seats)</td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Suspension arms/fixings</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Tie bars/anti roll bars</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Bushes</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th class="text-left">Brake hydraulics</th>
                                                                        <th class="text-center">Basic</th>
                                                                        <th class="text-center">Standard</th>
                                                                        <th class="text-center">Premium</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Master cylinder security (if accessible)</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Fluid leaks</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Servo/power system</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Flexible hoses</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="item">Pipes/connections</td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container false"></td>
                                                                        <td class="tick-container checked"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button class="btn btn-primary w-100">Add to basket</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal more info end -->
                                    </div>
                                    <!-- services item end -->
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <tbody>
                                                <tr class="group table-light">
                                                    <th>Compare</th>
                                                    <th class="text-center">Basic</th>
                                                    <th class="text-center">Standard</th>
                                                    <th class="text-center">Premium</th>
                                                </tr>
                                                <tr>
                                                    <td>Number of checks</td>
                                                    <td class="text-center"><strong>72</strong></td>
                                                    <td class="text-center"><strong>105</strong></td>
                                                    <td class="text-center"><strong>143</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Emailed report</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Road test (10 min)</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Follow-up call</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Plug in check</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Photos</td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_cross.svg')}}"></td>
                                                    <td class="text-center"><img alt="" src="{{asset('assets/frontend/images/icon_tick.svg')}}"></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Price</strong></td>
                                                    <td class="text-center"><span class="price-value"><strong>£86.44</strong></span></td>
                                                    <td class="text-center"><span class="price-value"><strong>£104.00</strong></span></td>
                                                    <td class="text-center"><span class="price-value"><strong>£146.38</strong></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary w-100">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary w-100">Add</button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary w-100">Add</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_tyre">
                                <div class="tab-pane-block">
                                    <h4 class="text-uppercase mb-2 text_primary">How many tyres do you need?</h4>
                                    <p>Please select the number of tyres you want fitted, you can change this later.</p>
                                </div>
                                <div class="tyres-select">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-center fw-bold mb-3">Front</p>
                                            <label class="form-check-btn" for="tyres_quantity_front_1">
                                                <input type="radio" value="1" name="tyres_quantity_front" id="tyres_quantity_front_1">
                                                <span class="form-check-btn-text">1</span>
                                            </label>
                                            <label class="form-check-btn" for="tyres_quantity_front_2">
                                                <input type="radio" value="2" name="tyres_quantity_front" id="tyres_quantity_front_2">
                                                <span class="form-check-btn-text">2</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-center fw-bold mb-3">Rear</p>
                                            <label class="form-check-btn" for="tyres_quantity_rear_1">
                                                <input type="radio" value="1" name="tyres_quantity_rear" id="tyres_quantity_rear_1">
                                                <span class="form-check-btn-text">1</span>
                                            </label>
                                            <label class="form-check-btn" for="tyres_quantity_rear_2">
                                                <input type="radio" value="2" name="tyres_quantity_rear" id="tyres_quantity_rear_2">
                                                <span class="form-check-btn-text">2</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div id="basket" class="panel basket">
                        <button id="basket_close" class="d-inline-block d-lg-none">
                            <img alt="" src="{{asset('assets/frontend/images/icon_close.svg')}}" width="15">
                        </button>

                        <div class="basket-summary totals">
                            <div class="basket-summary-title mb-1">Total price</div>
                            <div class="mb-2">
                                <div class="prices">
                                    <div id="price_box">
                                        @if (isset($details['total_price']))
                                            <div class="our-price">£<span>{{$details['total_price']}}</span></div>
                                        @else
                                            <div class="our-price">£<span>0</span></div>
                                        @endif

                                    </div>

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
                                    <div class="text-white fw-normal ">
                                        <span class="basket-dealer-price-label">The RAC price:</span>
                                        <span class="dealer-price text-decoration-line-through">£<span>99.00</span></span>
                                    </div>
                                    <div class="basket-save savings">You save <span>12</span>%</div>
                                </div>
                            </div>
                            <ul class="basket-user-details">
                                <li>AC 212 3.5L Petrol 2000</li>
                                <li>W12 7SB</li>
                            </ul>
                            <a class="text-decoration-underline small text-muted" href="booking_car.html">Edit</a>
                        </div>

                        <div class="quote-message">
                            <div id="manual-quote" class="quote-info unquoted-parts py-3">
                                <p class="title fw-bold m-0">
                                    Some parts are unavailable
                                    <a href="#" class="small text-decoration-underline" data-bs-toggle="modal" data-bs-target="#unquoted-parts-modal">What's this?</a>
                                </p>
                            </div>
                        </div>

                        <div class="selected-work-wrapper">
                            <h4 class="basket-work-title">Selected work</h4>
                            <ul class="basket-selected-work selected-work">


                            </ul>
                        </div>

                        <div class="free-collection-and-delivery basket-extras d-flex justify-content-between align-items-center">
                            <div>
                                <p>Collection & Delivery</p>
                            </div>
                            <span class="fw-bold">FREE</span>
                        </div>

                        <div class="free-warranty basket-extras d-flex justify-content-between align-items-center">
                            <div>
                                <p>12-Month Warranty</p>
                                <span class="text-muted fs-8">Valid on labour &amp; parts</span>
                            </div>
                            <span class="fw-bold">FREE</span>
                        </div>

                        <div class="basket-footer">
                            <form action="{{route('workdetails')}}" method="post">
                                @csrf
                                <input type="hidden" name="categories" id="categories" value="">
                                <input type="hidden" name="tyres" id="tyres" value="">
                                <input type="hidden" name="total_price" id="total_price" value="@if(isset($details['total_price'])){{$details['total_price']}}@endif">
                                {{-- <input type="hidden" name="car_details" value="{{$cardetails}}"> --}}
                                <button type="submit" class="btn btn-secondary w-100">Next step</button>
                                @error('categories')
                                    <div class="alert alert-danger">{{ str_replace(':input', old('categories'), $message) }}</div>
                                @enderror
                            </form>
                            {{-- <a href="{{route('bookingdetails')}}" class="btn btn-secondary w-100">Next step</a> --}}
                        </div>

                        <div class="local-mechanics">
                            <h5>Your local mechanics</h5>
                            <ul class="local-mechanics-teaser">
                                @foreach ($mechanics as $mechanic)
                                <li>
                                    <div class="d-table">
                                        <a class="d-table text-decoration-none" href="#">
                                            <div class="d-table-cell">
                                                <div class="local-mechanics-avatar" style="background-image: url('assets/frontend/images/mechanics_avatar_1.png')"></div>
                                            </div>
                                            <div class="d-table-cell align-top ps-3">
                                                <div class="local-mechanics-name">{{$mechanic->first_name.' '.$mechanic->last_name}}</div>
                                                <div class="local-mechanics-rating fiveStar-rating-wrapper">
                                                    <div class="fiveStar-rating" rating="5"></div>
                                                </div>
                                                <div class="text-muted small">17 reviews </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                            <p class="small text-muted mt-2">After you place your booking we will check availability of mechanics in your area.</p>
                        </div>

                        <div class="selling-points-wrapper">
                            <ul class="selling-points">
                                <li>
                                    <img class="me-2" alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="25"/>
                                    Qualified mechanics
                                </li>
                                <li>
                                    <img class="me-2" alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="25"/>
                                    No hidden extras
                                </li>
                                <li>
                                    <img class="me-2" alt="" src="{{asset('assets/frontend/images/circled-tick.svg')}}" width="25"/>
                                    Nationwide service
                                </li>
                            </ul>

                            <div class="mt-3">
                                <a class="discount-code-link" data-bs-toggle="collapse" href="#discount_collapse">Add discount code</a>
                                <div class="promo-panel mt-3 collapse" id="discount_collapse">
                                    <form class="promotion-code-form" id="promotion-code-form" action="#" method="post">
                                        <div class="form-wrap booking_promotion_code">
                                            <input class="form-control" placeholder="Discount code" type="text" name="booking[promotion_code]" id="booking_promotion_code">
                                        </div>
                                        <input type="submit" name="commit" value="Apply" class="btn btn-primary fw-bold w-100 mt-3">
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="summary-footer-links small">
                            <ul>
                                <li class="how-it-works-link">
                                    <a href="{{route('howitworks')}}" data-bs-toggle="modal" data-bs-target="#how-it-works-modal">How does ClickMechanic work?</a>
                                    <!-- Modal start -->
                                    <div class="modal fade" id="how-it-works-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">How does ClickMechanic work?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-4">
                                                        <div class="col-md-6 ">
                                                            <div class="text-center mb-4">
                                                                <img alt="" src="{{asset('assets/frontend/images/car_question.svg')}}" width="80">
                                                            </div>
                                                            <div>
                                                                <h4 class="mb-4">Tell us what you need</h4>
                                                                <p class="mb-4">Select your car and tell us what kind of service you need.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="text-center mb-4">
                                                                <img alt="" src="{{asset('assets/frontend/images/instant_quote.svg')}}" width="80">
                                                            </div>
                                                            <div>
                                                                <h4 class="mb-4">Get an instant quote</h4>
                                                                <p class="mb-4">We will give you an instant quote for the service.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="text-center mb-4">
                                                                <img alt="" src="{{asset('assets/frontend/images/availability.svg')}}" width="80">
                                                            </div>
                                                            <div>
                                                                <h4 class="mb-4">Tell us when you are available</h4>
                                                                <p class="mb-4">Your mechanic will come at the date and time of your choice.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="text-center mb-4">
                                                                <img alt="" src="{{asset('assets/frontend/images/home_car.svg')}}" width="80">
                                                            </div>
                                                            <div>
                                                                <h4 class="mb-4">The mechanic will come to your home and fix your car</h4>
                                                                <p class="mb-4">No need to go to the garage – just sit back, grab a drink, and enjoy your favourite show.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal end -->
                                </li>
                                <li class="about-our-mechanics-link">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#about-our-mechanics-modal">About the mechanics</a>
                                    <!-- Modal start -->
                                    <div class="modal fade" id="about-our-mechanics-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title">Only vetted mechanics on our network</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col-2">
                                                            <img alt="" src="{{asset('assets/frontend/images/star_rating.svg')}}">
                                                        </div>
                                                        <div class="col-10">
                                                            <b>Fully Qualified + Insured</b>
                                                            <p class="mt-1 fs-8">All of the mechanics on our network have at least a level 2 City &amp; Guilds motor mechanic qualification, along with trade &amp; liability insurance.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-2">
                                                            <img alt="" src="{{asset('assets/frontend/images/liability.svg')}}">
                                                        </div>
                                                        <div class="col-10">
                                                            <b>Great Reviews</b>
                                                            <p class="mt-1 fs-8">After each job we ask customers to review their mechanics, and we monitor these to ensure that only the best mechanics remain on our network.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <img alt="" src="{{asset('assets/frontend/images/experience.svg')}}">
                                                        </div>
                                                        <div class="col-10">
                                                            <b>5+ Years Experience</b>
                                                            <p class="mt-1 fs-8">Most of the mechanics on our network have franchise dealer experience before joining our network, but you'll pay a fraction of the price.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal end -->
                                </li>
                                <li class="frequently-asked-questions-link">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#helpModal">Frequently Asked Questions</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<script>
@if (isset($details['total_price']))
    var total_price={{$details['total_price']}};
@else
    var total_price=0;
@endif

const categories=[];
const tyres=[];

@if (isset($details['categories']))
    @foreach (json_decode($details['categories']) as $categ)
        categories.push({{$categ}});
    @endforeach
    $("#categories").val(JSON.stringify(categories));
@endif
@if (isset($details['tyres']))
    @foreach (json_decode($details['tyres']) as $tyre)
        tyres.push({{$tyre}});
    @endforeach
    $("#tyres").val(JSON.stringify(tyres));
@endif

$(document).ready(function(){
    @if (isset($details['categories']))
        ajaxAppendSelectedWork({{$details['categories']}});
    @endif
    @if (isset($details['tyres']))
        ajaxAppendSelectedTyreWork({{$details['tyres']}});
    @endif
    $(document).on('click','.append_category',function(){
        var slug=$(this).data('slug');
        var title=$(this).data('title');
        var price=Number($(this).data('price'));
        var id=Number($(this).data('id'));
        if($(this).find('img').length!=0)
        {
            $(this).removeClass('append_category');

            $(this).html('<img alt="" src="{{asset('assets/frontend/images/icon_remove.svg')}}"/>');
        }
        else{

            $(this).removeClass('btn-primary');
            $(this).addClass("btn-danger");
            $(this).removeClass('append_category');
            $(this).html('<span style="color:white">Remove</span>');
        }
        $(this).addClass('remove_category');
            if($(this).hasClass('is_tyre_btn'))
            {
                calculatePrice(id,price,'add',true); //id,price,method,is_tyre_btn
            }
            else{
                calculatePrice(id,price,'add',false); //id,price,method,is_tyre_btn
            }
            if($(this).hasClass('is_tyre_btn'))
            {
                appendSelectedWork(id,price,slug,title,true);
            }
            else{
                appendSelectedWork(id,price,slug,title,false);
            }


    })
    $(document).on('click', '.basket-remove-icon', function(){
        var price=$(this).closest('li').data('price');
        var slug=$(this).closest('li').data('slug');
        var id=Number($(this).closest('li').data('id'));
        price=Number(price);
        if($(this).hasClass('tyre-btn'))
        {
            calculatePrice(id,price,'subtract',true);
        }
        else
        {
            calculatePrice(id,price,'subtract',false);
        }
        $(this).closest('li').remove();
        var btn=$('button[data-slug="'+slug+'"]');
        // btn.innerHTML='<img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>';
        console.log("outside");
        if(btn.find('img').length==0)
        {
            console.log("if");
                btn.html('<span style="color:white">Add</span>');
                btn.addClass('btn-primary');
                btn.removeClass("btn-danger");
                    //$(this).removeClass('append_category');
        }
        else{
            console.log("else");
                btn.html('<img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>');
        }

        btn.removeClass('remove_category');
        btn.addClass('append_category');
    });
    $(document).on('click', '.remove_category', function(){
        var slug=$(this).data('slug');
        if($(this).find('img').length>0)
        {
            $(this).html('<img alt="" src="{{asset('assets/frontend/images/icon_plus.svg')}}"/>');
        }
        else
        {
            $(this).html('<span style="color:white">Add</span>');
            $(this).removeClass("btn-danger");
            $(this).addClass("btn-primary");
        }
        $('li[data-slug="'+slug+'"]').remove();
        if($(this).hasClass('is_tyre_btn'))
        {
            calculatePrice(Number($(this).data('id')),Number($(this).data('price')),'subtract',true);
        }
        else
        {
            calculatePrice(Number($(this).data('id')),Number($(this).data('price')),'subtract',false);
        }

        $(this).removeClass("remove_category");
        $(this).addClass("append_category");

    });
    $(document).on('click','.searched-item',function(){
        calculatePrice($(this).data('id'),Number($(this).data('price')),'add');
        appendSelectedWork($(this).data('id'),Number($(this).data('price')),$(this).data('slug'),$(this).data('title')); //id,price,slug,title
        $(".searched-item").remove();
    })
    $(document).on('click','#tyres_quantity_btn',function(){
        $("#tyres_size").css("display","flex");
        $("#tyres_quantity").css("display","none");
    });

    $(document).on('click',"#get_tyres_back_btn",function(){
        $("#tyres_size").css("display","none");
        $("#tyres_quantity").css("display","flex");
    });

    $("#tyre_width").change(function(){
        var tyre_widths_id=$(this).val();
        $.ajax({
            url: "{{url('api/fetch-tyreProfile')}}",
            type: "POST",
            data: {
                tyre_width_id:tyre_widths_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {
                $("#tyre_profile").html('<option>Select option</option>');
                $.each(result, function (key, value) {

                    $("#tyre_profile").append('<option value="'+value.id+'">'+value.title+'</option>');

                });

            }
        });
    });
    $("#tyre_profile").change(function(){
        var tyre_profiles_id=$(this).val();
        $.ajax({
            url: "{{url('api/fetch-tyrerim')}}",
            type: "POST",
            data: {
                tyre_profiles_id:tyre_profiles_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {

                $("#tyre_rim").html('<option>Select option</option>');
                $.each(result, function (key, value) {

                    $("#tyre_rim").append('<option value="'+value.id+'">'+value.title+'</option>');

                });

            }
        });
    });
    $("#tyre_rim").change(function(){
        var tyre_rims_id=$(this).val();
        $.ajax({
            url: "{{url('api/fetch-tyrespeed')}}",
            type: "POST",
            data: {
                tyre_rims_id:tyre_rims_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {

                $("#tyre_speed").html('<option>Select option</option>');
                $.each(result, function (key, value) {

                    $("#tyre_speed").append('<option value="'+value.id+'">'+value.title+'</option>');

                });

            }
        });
    });

    $("#repair_search").keyup(function(){
        var search=$(this).val();

        if(search.length>=3)
        {
            searchRepairs(search);
        }
        else
        {
            $(".searched-item").remove();
        }



    });
    $("#get_tyres_btn").click(function(){
        $("#tyres_size").css("display","none");
        $("#tyres_quantity").css("display","none");
        var width=$("#tyre_width").val();
        var profile=$("#tyre_profile").val();
        var rim=$("#tyre_rim").val();
        var speed=$("#tyre_speed").val();
        $.ajax({
            url: "{{url('api/fetch-tyrelist')}}",
            type: "POST",
            data: {
                width:width,
                profile:profile,
                rim:rim,
                speed:speed,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (result) {
                $.each(result, function (key, value) {

                    $("#tyres_list").append('<div class="col-md-6"><div class="card mt-4" style="width: 18rem;">{{-- <img class="card-img-top" src=" alt="Card image cap"> --}}<div class="card-body"><h5 class="card-title">'+value.title+'</h5><p class="card-text"> $'+value.price+'</p><button class="btn btn-primary ms-lg-3 append_category is_tyre_btn" data-id="'+value.id+'" data-slug="'+value.slug+'" data-price="'+value.price+'" data-title="'+value.title+'"><span>Add</span></button></div></div></div>');

                });

            }
        });

    });
});

function calculatePrice(id,price,method,is_tyre_btn=false)
{

    if(method=='add')
    {

        if($('.work-item[data-id="'+id+'"]').length==0)
        {
            total_price=total_price+price;
            if(!is_tyre_btn)
            {
                categories.push(id);
            }
            else{
                tyres.push(id);
            }

        }
    }
    else
    {
        total_price=total_price-price;

        if(!is_tyre_btn)
        {
            const index = categories.indexOf(id);// only splice array when item is found
            if (index > -1)
            {

                categories.splice(index, 1); // 2nd parameter means remove one item only
            }


        }
        else{
            const index2 = tyres.indexOf(id);// only splice array when item is found
            if (index2 > -1)
            {

                tyres.splice(index2, 1); // 2nd parameter means remove one item only
            }
            console.log(tyres);
        }
    }

    var jsonCategories=JSON.stringify(categories);
    var jsonTyres=JSON.stringify(tyres);
    $("#categories").val(jsonCategories);
    $("#tyres").val(jsonTyres);
    $("#total_price").val(total_price);
    $("#price_box").html('<div class="our-price">£<span>'+total_price+'</span></div>');
}
function ajaxAppendSelectedWork(jsonCategories)
{
    $.ajax({
        url: "{{url('api/fetch-categories')}}",
        type: "POST",
        data: {
            jsonCategories: jsonCategories,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (result) {
            $.each(result, function (key, value) {
                appendSelectedWork(value.id,value.price,value.slug,value.title);
            });

        }
    });
}
function ajaxAppendSelectedTyreWork(jsontyres)
{
    $.ajax({
        url: "{{url('api/fetch-tyres')}}",
        type: "POST",
        data: {
            jsontyres: jsontyres,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function (result) {
            $.each(result, function (key, value) {
                appendSelectedWork(value.id,value.price,value.slug,value.title,true);
            });

        }
    });
}
function searchRepairs(searchItem)
{
        $.ajax({
            url: "{{url('api/fetch-category')}}",
            type: "POST",
            data: {
                search:searchItem,
                _token: '{{csrf_token()}}'
            },
            success: function (result) {

                $(".searched-item").remove();
                $.each(result, function (key, value) {
                    $(".search-repairs").append('<li data-title="'+value.title+'" data-id="'+value.id+'" data-price="'+value.price+'" data-slug="'+value.slug+'" class="searched-item" style="list-style: none;border-bottom: 1px solid grey;padding-left: 30px;height: 40px;display: flex;align-items: center;">'+value.title+'</li>');

                });

            }
        });
}
function appendSelectedWork(id,price,slug,title,is_tyre=false)
{
    var className='';
    if(is_tyre)
    {
        className='tyre-btn';
    }
    console.log("class:"+className);
    if($('.work-item[data-id="'+id+'"]').length==0)
    {
        $(".selected-work").append('<li class="work-item"  data-id="'+id+'" data-price="'+price+'" data-slug="'+slug+'"><div class="d-table w-100"><div class="d-table-cell align-top" style="width: 20px"><span  class="basket-remove-icon '+className+'"><img alt="remove" src="{{asset("assets/frontend/images/icon_remove.svg")}}"></span></div><div class="d-table-cell -align-middle ps-2 fs-7 fw-500">'+title+'<!--<div class="label basket-pricing-message">MOT with Service discount: -£55</div>--><div class="basket-labour-times labour"><span>Up to 0.9 hours</span> labour time</div></div><div class="d-table-cell align-top text-end"><span class="price ps-4 fw-500">£<span>'+price+'</span></span></div></div><div class="parts"><div class="d-table width-100"><div class="d-table-cell" style="width: 20px"></div><div class="d-table-cell ps-2"><p class="text-muted fs-9 m-0">No parts included.</p></div></div></div></li>');
    }

}
</script>
@endsection
