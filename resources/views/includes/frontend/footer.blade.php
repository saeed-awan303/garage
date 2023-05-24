<footer>

    <div class="footer_top">
        <div class="container">
            <div class="row g-3">

                <div class="col-md-12 col-lg-4 footer_block">
                    <img class="mb-3" alt="" src="{{asset('assets/frontend/images/logo.png')}}" width="110">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent volutpat sodales varius. Ut congue lorem non odio mollis placerat. Suspendisse potenti. Mauris nec vulputate tellus. Morbi dui erat, lacinia sed sapien imperdiet</p>
                </div>

                <div class="col-md-12 col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-4 col-lg-4 footer_block">
                            <h4 class="footer_block_title">Services</h4>
                            <ul class="links">
                                @foreach (\App\Models\Service::all() as $service)
                                    <li><a href="#">{{$service->title}}</a></li>
                                @endforeach


                            </ul>
                        </div>

                        <div class="col-md-4 col-lg-4 footer_block">
                            <h4 class="footer_block_title">Follow Us</h4>
                            <ul class="social_links">
                                <li class="mb-2">
                                    <a href="#" class="d-inline-flex">
                                        <i class="fab fa-facebook-f"></i> <span>facebook</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="d-inline-flex">
                                        <i class="fab fa-twitter"></i> <span>Twitter</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-inline-flex">
                                        <i class="fab fa-instagram"></i> <span>Instagram</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-inline-flex">
                                        <i class="fab fa-youtube"></i> <span>YouTube</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 col-lg-4 footer_block">
                            <h4 class="footer_block_title">Contact Us</h4>

                            <ul class="social_links">
                                <li class="mb-2">
                                    <a href="#" class="d-inline-flex">
                                        <i class="fas fa-phone-alt"></i> <span>{{\App\Models\Setting::where('name','contact_number')->pluck('value')->first()}}</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="d-inline-flex">
                                        <i class="fas fa-envelope"></i> <span>{{\App\Models\Setting::where('name','contact_email')->pluck('value')->first()}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-inline-flex">
                                        <i class="fas fa-map-marker-alt"></i> <span>{{\App\Models\Setting::where('name','contact_email')->pluck('value')->first()}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-inline-flex">
                                        <i class="fas fa-business-time"></i> Monday – Friday 9am – 5pm
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer_copyright py-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <ul class="footer_copyright_links">
                        <li>
                            <a href="#">Terms and Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">© 2023 - ClickMechanic Ltd. | All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

</footer>
