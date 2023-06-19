@extends('admin.layouts.master')

@section('title',$title)
@section('content')
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row">
				<!--<div class="col-lg-12 col-xxl-4">-->
				<div class="col-12">
					<!--begin::Mixed Widget 1-->
					<div class="card card-custom bg-gray-100 card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 bg-danger py-5">
							<h3 class="card-title font-weight-bolder text-white">Stats</h3>
							<div class="card-toolbar">
								<div class="dropdown dropdown-inline">
									{{-- <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</a> --}}
									<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
										<!--begin::Navigation-->
										<ul class="navi navi-hover">
											<li class="navi-header pb-1">
												<span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
													<span class="navi-text">Order</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
													<span class="navi-text">Event</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
													<span class="navi-text">Report</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
													<span class="navi-text">Post</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
													<span class="navi-text">File</span>
												</a>
											</li>
										</ul>
										<!--end::Navigation-->
									</div>
								</div>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body p-0 position-relative overflow-hidden">
							<!--begin::Chart-->
							<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
							<!--end::Chart-->
							<!--begin::Stats-->
							<div class="card-spacer mt-n25">
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">

                                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Tools/Hummer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M18.4246212,12.6464466 L21.2530483,9.81801948 C21.4483105,9.62275734 21.764893,9.62275734 21.9601551,9.81801948 L22.6672619,10.5251263 C22.862524,10.7203884 22.862524,11.0369709 22.6672619,11.232233 L19.8388348,14.0606602 C19.6435726,14.2559223 19.3269901,14.2559223 19.131728,14.0606602 L18.4246212,13.3535534 C18.2293591,13.1582912 18.2293591,12.8417088 18.4246212,12.6464466 Z M3.22182541,17.9497475 L13.1213203,8.05025253 C13.5118446,7.65972824 14.1450096,7.65972824 14.5355339,8.05025253 L15.9497475,9.46446609 C16.3402718,9.85499039 16.3402718,10.4881554 15.9497475,10.8786797 L6.05025253,20.7781746 C5.65972824,21.1686989 5.02656326,21.1686989 4.63603897,20.7781746 L3.22182541,19.363961 C2.83130112,18.9734367 2.83130112,18.3402718 3.22182541,17.9497475 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M12.3890873,1.28248558 L12.3890873,1.28248558 C15.150511,1.28248558 17.3890873,3.52106183 17.3890873,6.28248558 L17.3890873,10.7824856 C17.3890873,11.058628 17.1652297,11.2824856 16.8890873,11.2824856 L12.8890873,11.2824856 C12.6129449,11.2824856 12.3890873,11.058628 12.3890873,10.7824856 L12.3890873,1.28248558 Z" fill="#000000" transform="translate(14.889087, 6.282486) rotate(-45.000000) translate(-14.889087, -6.282486) "/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
										<a href="{{ route('services.index') }}" class="text-warning font-weight-bold font-size-h6">New services</a>
									</div>
									<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
										<a href="{{ route('users.create') }}" class="text-primary font-weight-bold font-size-h6 mt-2">New Client</a>
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">

                                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
										<a href="{{ route('orders.index') }}" class="text-danger font-weight-bold font-size-h6 mt-2">Orders</a>
									</div>
									<div class="col bg-light-success px-6 py-8 rounded-xl">

                                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Tools/Tools.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
                                                                    <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
										<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Mechanics</a>
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 1-->
				</div>

				<!--<div class="col-lg-12 col-xxl-4">-->
				<div class="col-12">
					<!--begin::Stats Widget 11-->
					<div class="card card-custom card-stretch card-stretch-half gutter-b" style="height:100%">
						<!--begin::Body-->
						<div class="card-body p-0">
							<div class="row">
								<div class="col-12">
									<canvas id="orderChart"></canvas>
								</div>
							</div>

							{{-- <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success" style="height: 150px"></div> --}}
						</div>
						<!--end::Body-->
					</div>
					<!--end::Stats Widget 11-->
					<!--begin::Stats Widget 12-->
					{{-- <div class="card card-custom card-stretch card-stretch-half gutter-b">
						<!--begin::Body-->
						<div class="card-body p-0">
							{{-- <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-primary mr-2">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-primary">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</span>
								{{-- <div class="d-flex flex-column text-right">
									<span class="text-dark-75 font-weight-bolder font-size-h3">{{ $usersCount }}</span>
									<span class="text-muted font-weight-bold mt-2">Clients</span>
								</div>
							</div> --}}
							{{-- <div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary" style="height: 150px"></div>
                            <h1>bar</h1>

						</div>
						<!--end::Body-->
					</div> --}}
					<!--end::Stats Widget 12-->
				</div>




			</div>
			<!--end::Row-->
			<!--begin::Row-->

			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        var orderData = <?php echo json_encode($orderData); ?>;

    var ctx = document.getElementById('orderChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(orderData),
            datasets: [{
                label: 'Number of Orders',
                data: Object.values(orderData),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
    var clientCounts = {!! $clientCounts !!};
    var maxUsersCount={!! $maxUsersCount !!};
    </script>
@endsection
