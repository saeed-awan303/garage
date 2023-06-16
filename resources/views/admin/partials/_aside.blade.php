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
                <li class="menu-item <?php if (Request::segment(1) == '') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('fronthome') }}" target="_blank" class="menu-link">
                        <span class="svg-icon menu-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Devices/Laptop.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M6,8 L6,16 L18,16 L18,8 L6,8 Z M20,16 L21.381966,16 C21.7607381,16 22.1070012,16.2140024 22.2763932,16.5527864 L22.5,17 C22.6706654,17.3413307 22.5323138,17.7563856 22.190983,17.927051 C22.0950363,17.9750244 21.9892377,18 21.881966,18 L2.11803399,18 C1.73641461,18 1.42705098,17.6906364 1.42705098,17.309017 C1.42705098,17.2017453 1.45202663,17.0959467 1.5,17 L1.7236068,16.5527864 C1.89299881,16.2140024 2.23926193,16 2.61803399,16 L4,16 L4,8 C4,6.8954305 4.8954305,6 6,6 L18,6 C19.1045695,6 20,6.8954305 20,8 L20,16 Z" fill="#000000" fill-rule="nonzero"/>
                                <polygon fill="#000000" opacity="0.3" points="6 8 6 16 18 16 18 8"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <span class="menu-text">Visit Site</span>
                    </a>
                </li>
                <li class="menu-section">
                    <h4 class="menu-text">Features</h4>
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
                        <span class="menu-text"> Clients</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'mechanics') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('mechanics.index') }}" class="menu-link">

                        <span class="svg-icon menu-icon svg-icon-primary"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Tools/Tools.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
                                <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <span class="menu-text">Mechincs</span>
                    </a>
                </li>

                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'services') {
                    echo 'menu-item-active';
                    } ?>" aria-haspopup="true">
                    <a href="{{ route('services.index') }}" class="menu-link">

                        <span class="svg-icon menu-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Tools/Hummer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M18.4246212,12.6464466 L21.2530483,9.81801948 C21.4483105,9.62275734 21.764893,9.62275734 21.9601551,9.81801948 L22.6672619,10.5251263 C22.862524,10.7203884 22.862524,11.0369709 22.6672619,11.232233 L19.8388348,14.0606602 C19.6435726,14.2559223 19.3269901,14.2559223 19.131728,14.0606602 L18.4246212,13.3535534 C18.2293591,13.1582912 18.2293591,12.8417088 18.4246212,12.6464466 Z M3.22182541,17.9497475 L13.1213203,8.05025253 C13.5118446,7.65972824 14.1450096,7.65972824 14.5355339,8.05025253 L15.9497475,9.46446609 C16.3402718,9.85499039 16.3402718,10.4881554 15.9497475,10.8786797 L6.05025253,20.7781746 C5.65972824,21.1686989 5.02656326,21.1686989 4.63603897,20.7781746 L3.22182541,19.363961 C2.83130112,18.9734367 2.83130112,18.3402718 3.22182541,17.9497475 Z" fill="#000000" opacity="0.3"/>
                                <path d="M12.3890873,1.28248558 L12.3890873,1.28248558 C15.150511,1.28248558 17.3890873,3.52106183 17.3890873,6.28248558 L17.3890873,10.7824856 C17.3890873,11.058628 17.1652297,11.2824856 16.8890873,11.2824856 L12.8890873,11.2824856 C12.6129449,11.2824856 12.3890873,11.058628 12.3890873,10.7824856 L12.3890873,1.28248558 Z" fill="#000000" transform="translate(14.889087, 6.282486) rotate(-45.000000) translate(-14.889087, -6.282486) "/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
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

                <li class="menu-item menu-item-submenu <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'faq_cats' or Request::segment(2) == 'faqs') {
                    echo 'menu-item-active';
                    }?>" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                       <span class="svg-icon menu-icon">
                          <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path
                                   d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                   fill="#000000"/>
                                <path
                                   d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                   fill="#000000" opacity="0.3"/>
                             </g>
                          </svg>
                          <!--end::Svg Icon-->
                       </span>
                       <span class="menu-text">Faq's</span>
                       <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                          <li class="menu-item menu-item-parent" aria-haspopup="true">
                             <span class="menu-link">
                             <span class="menu-text">Faq's</span>
                             </span>
                          </li>
                          <li class="menu-item" aria-haspopup="true">
                             <a href="{{ route('faq_cats.index') }}" class="menu-link">
                             <i class="menu-bullet menu-bullet-dot">
                             <span></span>
                             </i>
                             <span class="menu-text">Faq Categories</span>
                             </a>
                          </li>
                          <li class="menu-item" aria-haspopup="true">
                             <a href="{{ route('faqs.index') }}" class="menu-link">
                             <i class="menu-bullet menu-bullet-dot">
                             <span></span>
                             </i>
                             <span class="menu-text">Faq's</span>
                             </a>
                          </li>

                       </ul>
                    </div>
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

            <li class="menu-item menu-item-submenu <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'tyres' or Request::segment(2) == 'tyre_widths' or Request::segment(2) == 'tyre_profiles' or Request::segment(2) == 'rims' or Request::segment(2) == 'tyre_speeds' or Request::segment(2) == 'tyre_details' ) {
               echo 'menu-item-active';
               }?>" aria-haspopup="true" data-menu-toggle="hover">
               <a href="javascript:;" class="menu-link menu-toggle">
                  <span class="svg-icon menu-icon">
                     <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24"/>
                           <path
                              d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                              fill="#000000"/>
                           <path
                              d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                              fill="#000000" opacity="0.3"/>
                        </g>
                     </svg>
                     <!--end::Svg Icon-->
                  </span>
                  <span class="menu-text">Tyres</span>
                  <i class="menu-arrow"></i>
               </a>
               <div class="menu-submenu">
                  <i class="menu-arrow"></i>
                  <ul class="menu-subnav">
                     <li class="menu-item menu-item-parent" aria-haspopup="true">
                        <span class="menu-link">
                        <span class="menu-text">Tyres</span>
                        </span>
                     </li>
                     <li class="menu-item" aria-haspopup="true">
                        <a href="{{route('tyres.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                        </i>
                        <span class="menu-text">Manage Tyres</span>
                        </a>
                     </li>
                     <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('tyre_widths.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                        </i>
                        <span class="menu-text">Tyre Widths</span>
                        </a>
                     </li>
                     <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('tyre_profiles.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                        </i>
                        <span class="menu-text">Tyre Profile</span>
                        </a>
                     </li>
                     <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('rims.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                        </i>
                        <span class="menu-text">Tyre Rims</span>
                        </a>
                     </li>
                     <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('tyre_speeds.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                        </i>
                        <span class="menu-text">Tyre Speed</span>
                        </a>
                     </li>
                     <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('tyre_details.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                        </i>
                        <span class="menu-text">Tyre Details</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </li>



                <li class="menu-item <?php if (Request::segment(1) == 'admin' && Request::segment(2) == 'roles') {
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
                </li>


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




            </ul>

            <!--end::Menu Nav-->
        </div>

        <!--end::Menu Container-->
    </div>

    <!--end::Aside Menu-->
</div>

<!--end::Aside-->
