<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">

        <!--begin::Logo-->
        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
            {{-- <img alt="Logo" src="{{ asset($logo) }}" /> --}}

        </a>
         <h3 class="text-white">Garage</h3>
        <!--end::Logo-->

        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">

                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>

                <!--end::Svg Icon-->
            </span>
        </button>

        <!--end::Toolbar-->
    </div>

    <!--end::Brand-->

    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">

            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'dashboard') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>

                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="menu-section">
                    <h4 class="menu-text">CMS</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'clients') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('clients.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text"> Users</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'mechanics') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('mechanics.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Expand-arrows.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z" fill="#000000" opacity="0.3" transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) "/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Mechincs</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'services') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('services.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Expand-arrows.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z" fill="#000000" opacity="0.3" transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) "/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Services</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'categories') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('categories.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Layout/Layout-top-panel-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" x="2" y="4" width="19" height="4" rx="1"/>
                                    <path d="M3,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,19 C7,19.5522847 6.55228475,20 6,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M10,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M17,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,11 C16,10.4477153 16.4477153,10 17,10 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>

                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Categories</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'customs') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('customs.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Git2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="5" y="8" width="1" height="6" rx="1"/>
                                    <path d="M6,21 C7.1045695,21 8,20.1045695 8,19 C8,17.8954305 7.1045695,17 6,17 C4.8954305,17 4,17.8954305 4,19 C4,20.1045695 4.8954305,21 6,21 Z M6,23 C3.790861,23 2,21.209139 2,19 C2,16.790861 3.790861,15 6,15 C8.209139,15 10,16.790861 10,19 C10,21.209139 8.209139,23 6,23 Z" fill="#000000" fill-rule="nonzero"/>
                                    <rect fill="#000000" opacity="0.3" x="17" y="8" width="2" height="8" rx="1"/>
                                    <path d="M18,21 C19.1045695,21 20,20.1045695 20,19 C20,17.8954305 19.1045695,17 18,17 C16.8954305,17 16,17.8954305 16,19 C16,20.1045695 16.8954305,21 18,21 Z M18,23 C15.790861,23 14,21.209139 14,19 C14,16.790861 15.790861,15 18,15 C20.209139,15 22,16.790861 22,19 C22,21.209139 20.209139,23 18,23 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M18,7 C19.1045695,7 20,6.1045695 20,5 C20,3.8954305 19.1045695,3 18,3 C16.8954305,3 16,3.8954305 16,5 C16,6.1045695 16.8954305,7 18,7 Z M18,9 C15.790861,9 14,7.209139 14,5 C14,2.790861 15.790861,1 18,1 C20.209139,1 22,2.790861 22,5 C22,7.209139 20.209139,9 18,9 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Custom Requests</span>
                    </a>
                </li>


                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'faq_cats') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('faq_cats.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Puzzle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M19,11 L20,11 C21.6568542,11 23,12.3431458 23,14 C23,15.6568542 21.6568542,17 20,17 L19,17 L19,20 C19,21.1045695 18.1045695,22 17,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,17 L5,17 C6.65685425,17 8,15.6568542 8,14 C8,12.3431458 6.65685425,11 5,11 L3,11 L3,8 C3,6.8954305 3.8954305,6 5,6 L8,6 L8,5 C8,3.34314575 9.34314575,2 11,2 C12.6568542,2 14,3.34314575 14,5 L14,6 L17,6 C18.1045695,6 19,6.8954305 19,8 L19,11 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Faq Categories</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'faqs') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('faqs.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                          <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Lock-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Faq's</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'makes') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('makes.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Design/Cap-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="7" r="2"/>
                                    <path d="M11,19 L4,19 L4,7 L7.03051599,7 C7.01035184,7.16416693 7,7.33099545 7,7.5 C7,9.67706212 8.71775968,11.4930404 11,11.9099837 L11,19 Z M13,19 L13,11.9099837 C15.2822403,11.4930404 17,9.67706212 17,7.5 C17,7.33099545 16.9896482,7.16416693 16.969484,7 L20,7 L20,19 L13,19 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>

                        </span>
                        <span class="menu-text">Makes</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'models') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('models.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Design/Pencil.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M10.5,8 L6,19 C6.0352633,19.1332661 6.06268417,19.2312688 6.08226261,19.2940083 C6.43717645,20.4313361 8.07642225,21 9,21 C10.5,21 11,19 12.5,19 C14,19 14.5917308,20.9843119 16,21 C16.9388462,21.0104588 17.9388462,20.3437921 19,19 L14.5,8 L10.5,8 Z" fill="#000000"/>
                                    <path d="M11.3,6 L12.5,3 L13.7,6 L11.3,6 Z M14.5,8 L10.5,8 L14.5,8 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Models</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'fuels') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('fuels.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Weather/Temperature-empty.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M13.9985481,12.5339049 L13,11.956276 L13,5 C13,4.73295228 12.4830082,4.00879513 12,4 C11.4840929,3.99060581 11,4.71476297 11,5 L11,11.956276 L10.0014519,12.5339049 C8.77163638,13.2453148 8,14.5543681 8,16 C8,18.209139 9.790861,20 12,20 C14.209139,20 16,18.209139 16,16 C16,14.5543681 15.2283636,13.2453148 13.9985481,12.5339049 Z M18,16 C18,19.3137085 15.3137085,22 12,22 C8.6862915,22 6,19.3137085 6,16 C6,13.7791529 7.20659589,11.8401214 9,10.8026932 L9,5 C9,3.34314575 10.3431458,2 12,2 C13.6568542,2 15,3.34314575 15,5 L15,10.8026932 C16.7934041,11.8401214 18,13.7791529 18,16 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Fuel Types</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'engines') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('engines.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Design/Flip-vertical.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M9.07117914,12.5710461 L13.8326627,12.5710461 C14.108805,12.5710461 14.3326627,12.3471885 14.3326627,12.0710461 L14.3326627,0.16733734 C14.3326627,-0.108805035 14.108805,-0.33266266 13.8326627,-0.33266266 C13.6282104,-0.33266266 13.444356,-0.208187188 13.3684243,-0.0183579985 L8.6069408,11.8853508 C8.50438409,12.1417426 8.62909204,12.4327278 8.8854838,12.5352845 C8.94454394,12.5589085 9.00756943,12.5710461 9.07117914,12.5710461 Z" fill="#000000" opacity="0.3" transform="translate(11.451854, 6.119192) rotate(-270.000000) translate(-11.451854, -6.119192) "/>
                                    <path d="M9.23851648,24.5 L14,24.5 C14.2761424,24.5 14.5,24.2761424 14.5,24 L14.5,12.0962912 C14.5,11.8201488 14.2761424,11.5962912 14,11.5962912 C13.7955477,11.5962912 13.6116933,11.7207667 13.5357617,11.9105959 L8.77427814,23.8143047 C8.67172143,24.0706964 8.79642938,24.3616816 9.05282114,24.4642383 C9.11188128,24.4878624 9.17490677,24.5 9.23851648,24.5 Z" fill="#000000" transform="translate(11.500000, 18.000000) scale(1, -1) rotate(-270.000000) translate(-11.500000, -18.000000) "/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="11" y="2" width="2" height="20" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Engine Capacity</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'tyres') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('tyres.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Tools/Roulette.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M22,8 C22,8.55228475 21.5522847,9 21,9 L19,9 L19,15 C19,18.3137085 16.3137085,21 13,21 L5,21 C3.8954305,21 3,20.1045695 3,19 L3,11 C3,7.6862915 5.6862915,5 9,5 L17,5 C18.1045695,5 19,5.8954305 19,7 L21,7 L21,6 L22,6 L22,8 Z M11,17 C13.209139,17 15,15.209139 15,13 C15,10.790861 13.209139,9 11,9 C8.790861,9 7,10.790861 7,13 C7,15.209139 8.790861,17 11,17 Z" fill="#000000"/>
                                    <path d="M12,3 L15,3 C15.5522847,3 16,3.44771525 16,4 L16,5 L11,5 L11,4 C11,3.44771525 11.4477153,3 12,3 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Tyre</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'tyre_widths') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('tyre_widths.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Commit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M20.5,11 L22.5,11 C23.3284271,11 24,11.6715729 24,12.5 C24,13.3284271 23.3284271,14 22.5,14 L20.5,14 C19.6715729,14 19,13.3284271 19,12.5 C19,11.6715729 19.6715729,11 20.5,11 Z M1.5,11 L3.5,11 C4.32842712,11 5,11.6715729 5,12.5 C5,13.3284271 4.32842712,14 3.5,14 L1.5,14 C0.671572875,14 1.01453063e-16,13.3284271 0,12.5 C-1.01453063e-16,11.6715729 0.671572875,11 1.5,11 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M12,16 C13.6568542,16 15,14.6568542 15,13 C15,11.3431458 13.6568542,10 12,10 C10.3431458,10 9,11.3431458 9,13 C9,14.6568542 10.3431458,16 12,16 Z M12,18 C9.23857625,18 7,15.7614237 7,13 C7,10.2385763 9.23857625,8 12,8 C14.7614237,8 17,10.2385763 17,13 C17,15.7614237 14.7614237,18 12,18 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Tyre Widths</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'tyre_profiles') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('tyre_profiles.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Git4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M7,11.4648712 L7,17 C7,18.1045695 7.8954305,19 9,19 L15,19 L15,21 L9,21 C6.790861,21 5,19.209139 5,17 L5,8 L5,7 L7,7 L7,8 C7,9.1045695 7.8954305,10 9,10 L15,10 L15,12 L9,12 C8.27142571,12 7.58834673,11.8052114 7,11.4648712 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M18,22 C19.1045695,22 20,21.1045695 20,20 C20,18.8954305 19.1045695,18 18,18 C16.8954305,18 16,18.8954305 16,20 C16,21.1045695 16.8954305,22 18,22 Z M18,24 C15.790861,24 14,22.209139 14,20 C14,17.790861 15.790861,16 18,16 C20.209139,16 22,17.790861 22,20 C22,22.209139 20.209139,24 18,24 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M18,13 C19.1045695,13 20,12.1045695 20,11 C20,9.8954305 19.1045695,9 18,9 C16.8954305,9 16,9.8954305 16,11 C16,12.1045695 16.8954305,13 18,13 Z M18,15 C15.790861,15 14,13.209139 14,11 C14,8.790861 15.790861,7 18,7 C20.209139,7 22,8.790861 22,11 C22,13.209139 20.209139,15 18,15 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Tyre Profile</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'rims') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('rims.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Commit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M20.5,11 L22.5,11 C23.3284271,11 24,11.6715729 24,12.5 C24,13.3284271 23.3284271,14 22.5,14 L20.5,14 C19.6715729,14 19,13.3284271 19,12.5 C19,11.6715729 19.6715729,11 20.5,11 Z M1.5,11 L3.5,11 C4.32842712,11 5,11.6715729 5,12.5 C5,13.3284271 4.32842712,14 3.5,14 L1.5,14 C0.671572875,14 1.01453063e-16,13.3284271 0,12.5 C-1.01453063e-16,11.6715729 0.671572875,11 1.5,11 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M12,16 C13.6568542,16 15,14.6568542 15,13 C15,11.3431458 13.6568542,10 12,10 C10.3431458,10 9,11.3431458 9,13 C9,14.6568542 10.3431458,16 12,16 Z M12,18 C9.23857625,18 7,15.7614237 7,13 C7,10.2385763 9.23857625,8 12,8 C14.7614237,8 17,10.2385763 17,13 C17,15.7614237 14.7614237,18 12,18 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Tyre Rims</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'tyre_speeds') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('tyre_speeds.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Commit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M20.5,11 L22.5,11 C23.3284271,11 24,11.6715729 24,12.5 C24,13.3284271 23.3284271,14 22.5,14 L20.5,14 C19.6715729,14 19,13.3284271 19,12.5 C19,11.6715729 19.6715729,11 20.5,11 Z M1.5,11 L3.5,11 C4.32842712,11 5,11.6715729 5,12.5 C5,13.3284271 4.32842712,14 3.5,14 L1.5,14 C0.671572875,14 1.01453063e-16,13.3284271 0,12.5 C-1.01453063e-16,11.6715729 0.671572875,11 1.5,11 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M12,16 C13.6568542,16 15,14.6568542 15,13 C15,11.3431458 13.6568542,10 12,10 C10.3431458,10 9,11.3431458 9,13 C9,14.6568542 10.3431458,16 12,16 Z M12,18 C9.23857625,18 7,15.7614237 7,13 C7,10.2385763 9.23857625,8 12,8 C14.7614237,8 17,10.2385763 17,13 C17,15.7614237 14.7614237,18 12,18 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Tyre Speed</span>
                    </a>
                </li>

                {{-- <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'roles') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                        r="10" />
                                    <path
                                        d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 L7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>

                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Manage Roles</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'permissions') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('permissions.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                        r="10" />
                                    <path
                                        d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 L7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>

                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">Manage Permissions</span>
                    </a>
                </li> --}}
                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'setting') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('setting.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Settings4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Settings</span>
                    </a>
                </li>
                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'setting') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('tyre_details.index') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Settings4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="menu-text">Tyres detail</span>
                    </a>
                </li>




            </ul>

            <!--end::Menu Nav-->
        </div>

        <!--end::Menu Container-->
    </div>

    <!--end::Aside Menu-->
</div>

<!--end::Aside-->
