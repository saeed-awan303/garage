@extends('admin.layouts.master')
@section('title',$title)
@section('stylesheets')
@include('admin.partials.validations_style')
@endsection
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
              <h3 class="card-label">Tyre Width Add Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('tyre_widths.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href="javascript::void(0)"  onclick="return validated()" id="kt_btn" class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-sm"></i>Save</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::open([ 'route' => 'tyre_widths.store','class'=>'form' ,"id"=>"tyre_add_form", 'enctype'=>'multipart/form-data']) }}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Tyre Width Info: </h3>
                    <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                      <label class="col-3">Title</label>
                      <div class="col-9">
                        {{ Form::text('title', null, ['class' => 'form-control form-control-solid','id'=>'title','placeholder'=>'Enter title','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('tyre') ? 'has-error' : '' }}">
                        <label class="col-3">Tyre</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="tyre" required>

                                <option value="">--! Select Type !--</option>
                                @foreach($tyres as $tyre)
                                    <option value="{{$tyre->id}}">{{$tyre->title}} </option>
                                @endforeach

                                <span class="text-danger">{{ $errors->first('tyre') }}</span>
                            </select>
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

    function validated() {

         $("#tyre_add_form").validate({
         errorClass: "error fail-alert",
         validClass: "valid success-alert",
         rules: {
            title: {
                required: true,
            },
            tyre: {
                required:true
            },



        },
        messages: {
            title: {
                required: "Please enter title.",
            },
            type: {
                required: "Please select at least one type.",
            },


            // image: {
            //     required: "Please upload an image.",
            //     accept: "Please upload a valid image file.",
            // },
        }
    });
         if ($('#tyre_add_form').valid()) // check if form is valid
         {

         $("#tyre_add_form").submit();
         } else {

         return false;
         }
 }
   </script>
@endsection
