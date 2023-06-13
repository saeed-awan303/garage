@extends('layouts.frontend.app')
@section('main-content')
<!-- Booking flow progress start-->
<div class="booking-flow-progress">
    <div class="booking-flow-progress-inner">
        <ul class="booking-flow-progress-steps">
            <li class="@if(isset($details['make'])){{"is-complete"}} @else {{"is-current"}} @endif">
                <a href="#">1</a>
                <p class="progress-step-context">Car</p>
            </li>
            <li class="@if(isset($details['categories'])){{"is-complete"}} @endif">
                <a href="@if(isset($details['categories'])) {{route('workdetails')}} @else {{"#"}} @endif">2</a>
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
        <h2 class="text-center mb-3">Tell us about your car</h2>
        <div class="car_form_wrapper">


                <ul class="nav tabs-navigation mb-4 ">
                    <li class="nav-item " data-bs-toggle="pill" data-bs-target="#tab_number">
                        Use number plate
                    </li>
                    <li class="nav-item active" data-bs-toggle="pill" data-bs-target="#tab_fields">
                        Use car details
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade " id="tab_number">
                        <form id="booking_car_form" method="post" action="{{ route('getcardetails') }}">
                            @csrf
                            <div class="form_wrap has-icon car-icon mb-3">
                                <input type="text" class="form-control" placeholder="Your car reg" name="reg" required="required">
                            </div>
                            <div class="form_wrap has-icon location-pin mb-3">
                                <input type="text" class="form-control" placeholder="Your postcode" name="postcode" required="required">
                            </div>

                            <input type="submit" name="commit" value="Next step" class="btn btn-secondary w-100 btn_md">
                        </form>
                    </div>

                    <div class="tab-pane fade show active" id="tab_fields">
                        <form id="booking_car_form" method="post" action="{{route('bookingcar')}}">
                            @csrf
                            <div class="form-wrap mb-3">
                                <select class="form-select"  name="make" id="make_id" required>
                                    <option value="">Select make</option>
                                    @foreach($makes as $make)
                                        <option value="{{$make->id}}" @if(isset($details['make']) && $details['make']==$make->id){{"selected"}}@endif>{{$make->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-wrap mb-3">
                                <select class="form-control" name="model" id="model-id" required>
                                    <option value="">select model</option>
                                </select>
                            </div>
                            <div class="form-wrap mb-3">
                                <select class="form-control" name="fuel" id="fuel-id" required>
                                    <option value="">select fuel</option>

                                </select>
                            </div>
                            <div class="form-wrap mb-3">
                                <select class="form-select" name="year" id="booking_car_attributes_year" required>
                                    <option value="">Select year</option>

                                    @for($i=date('Y');$i>=1990;$i--)
                                        <option value="{{$i}}" @if(isset($details['year'])&&$details['year']==$i){{"selected"}}@endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            {{-- <div class="form-wrap mb-3">
                                <select class="form-select" name="booking[car_attributes][fuel]" id="booking_car_attributes_fuel">
                                    <option value="">Select fuel type</option>
                                    <option value="Petrol">Petrol</option>
                                </select>
                            </div> --}}
                            <div class="form_wrap has-icon location-pin mb-3">
                                <input type="text" class="form-control" placeholder="Your postcode" name="postcode" required="required" value="@if(isset($details['postcode'])){{$details['postcode']}}@endif" required>
                            </div>

                            <input type="submit" name="commit" value="Next step" class="btn btn-secondary w-100 btn_md">
                        </form>
                    </div>
                </div>



            </form>
        </div>
    </div>

</main>
<script>
    $(document).ready(function () {
        @if (isset($details['model']))
            getModels({{$details['make']}},{{$details['model']}});
        @endif
        @if (isset($details['fuel']))
            getFeul({{$details['model']}},{{$details['fuel']}});
        @endif
        $('#make_id').on('change', function () {

            var idmake = this.value;
            var result=getModels(idmake);

        });


        $('#model-id').on('change', function () {
            var idmodel = this.value;
            getFeul(idmodel);

        });

    });
    function getModels(make_id,selected=null)
    {

        var idmake = make_id;

            $.ajax({
                url: "{{url('api/fetch-models')}}",
                type: "POST",
                data: {
                    make_id: idmake,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {

                    $('#model-id').html('<option value="">-- Select Models --</option>');
                    $.each(result.models, function (key, value) {
                        selected=(selected==value.id)?'selected':'';
                        $("#model-id").append('<option value="' + value
                            .id + '"'+selected+'>' + value.title + '</option>');
                    });

                }
            });

    }
    function getFeul(model_id,selected=null)
    {
        var idmodel=model_id;
        $.ajax({
                url: "{{url('api/fetch-fuel')}}",
                type: "POST",
                data: {
                    model_id: idmodel,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#fuel-id').html('<option value="">-- Select Fuel Type --</option>');
                    $('#engine-id').html('<option value="">-- Select Engine Capacity --</option>');
                    $.each(res.fuels, function (key, value) {
                        selected=(selected==value.id)?'selected':'';
                        $("#fuel-id").append('<option value="' + value
                            .id + '"'+selected+'>' + value.title + '</option>');
                    });
                    $.each(res.engines, function (key, value) {
                        $("#engine-id").append('<option value="' + value
                            .id + '">' + value.title + '</option>');
                    });
                }
            });
    }
</script>
@endsection
