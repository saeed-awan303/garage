@extends('admin.layouts.master')
@section('title',$title)
@section('content')
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Card-->
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
          <div class="card-header" style="">
            <div class="card-title">
              <h3 class="card-label">Tyre detail Add Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('tyre_details.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href="{{ route('tyre_details.store') }}"  onclick="event.preventDefault(); document.getElementById('tyre_add_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>Save</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::open([ 'route' => 'tyre_details.store','class'=>'form' ,"id"=>"tyre_add_form", 'enctype'=>'multipart/form-data']) }}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Tyre Info: </h3>
                    <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                      <label class="col-3">Title</label>
                      <div class="col-9">
                        {{ Form::text('title', null, ['class' => 'form-control form-control-solid','id'=>'title','placeholder'=>'Enter title','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('tyre_width') ? 'has-error' : '' }}">
                        <label class="col-3">Tyre width</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="tyre_width" required id="tyre_width">

                                <option value="">--! Select Type width!--</option>
                                @foreach($widths as $width)
                                    <option value="{{$width->id}}">{{$width->title}} </option>
                                @endforeach

                                <span class="text-danger">{{ $errors->first('tyre_width') }}</span>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('tyre_profile') ? 'has-error' : '' }}">
                        <label class="col-3">Tyre profile</label>
                        <div class="col-9">
                            <select class="form-control form-control-solid" name="tyre_profile" id="tyre_profile">

                            </select>
                            <span class="text-danger">{{ $errors->first('tyre_profile') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('tyre_rim') ? 'has-error' : '' }}">
                        <label class="col-3">Tyre rim</label>
                        <div class="col-9">
                            <select class="form-control form-control-solid" name="tyre_rim" id="tyre_rim">

                            </select>
                            <span class="text-danger">{{ $errors->first('tyre_rim') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('tyre_speed') ? 'has-error' : '' }}">
                        <label class="col-3">Tyre speed</label>
                        <div class="col-9">
                            <select class="form-control form-control-solid" name="tyre_speed" id="tyre_speed">

                            </select>
                            <span class="text-danger">{{ $errors->first('tyre_speed') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('price') ? 'has-error' : '' }}">
                        <label class="col-3">Price</label>
                        <div class="col-9">
                            {{ Form::text('price', null, ['class' => 'form-control form-control-solid','id'=>'price','placeholder'=>'Enter price','required'=>'true']) }}
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                    </div>


                  </div>

                </div>
                <div class="col-xl-2"></div>
              </div>
          {{Form::close()}}
            <!--end::Form-->
          </div>
        </div>
        <!--end::Card-->

      </div>
      <!--end::Container-->
    </div>
    <!--end::Entry-->
  </div>
  <script>
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
  </script>
@endsection
