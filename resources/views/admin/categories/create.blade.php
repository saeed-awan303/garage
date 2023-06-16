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
              <h3 class="card-label">Category Add Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('categories.index') }}" class="btn btn-light-primary
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
            {{ Form::open([ 'route' => 'categories.store','class'=>'form' ,"id"=>"category_add_form", 'enctype'=>'multipart/form-data']) }}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Category Info: </h3>
                    <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                      <label class="col-3">Title</label>
                      <div class="col-9">
                        {{ Form::text('title', null, ['class' => 'form-control form-control-solid','id'=>'title','placeholder'=>'Enter title','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('service') ? 'has-error' : '' }}">
                        <label class="col-3">Service Category</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="service" id="service" required>

                                <option value="">--! Select Service !--</option>
                                @foreach ($services as $service)
                                     <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                                <span class="text-danger">{{ $errors->first('service') }}</span>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        <label class="col-3">Parent Category</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="parent_id" >

                                <option value="">--! Select Parent Category !--</option>
                                @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                                 <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('price') ? 'has-error' : '' }}">
                      <label class="col-3">Price ($)</label>
                      <div class="col-9">
                        {{ Form::number('price', null, ['class' => 'form-control form-control-solid','id'=>'price','placeholder'=>'Enter price','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-3 col-form-label">Status</label>
                      <div class="col-3">
                         <span class="switch switch-outline switch-icon switch-success">
                          <label><input type="checkbox" checked="checked" name="status" value="1">
                            <span></span>
                          </label>
                        </span>
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

         $("#category_add_form").validate({
         errorClass: "error fail-alert",
         validClass: "valid success-alert",
         rules: {
            title: {
                required: true,
            },
            service: {
                required: true,
            },
            price: {
                required: true,
            },

            // image: {
            //     required: true,
            //     accept: "image/*",
            // },
        },
        messages: {
            title: {
                required: "Please enter a title.",
            },
            service: {
                required: "Please select service.",
            },
            price: {
                required: "Please enter price.",
            },
            // image: {
            //     required: "Please upload an image.",
            //     accept: "Please upload a valid image file.",
            // },
        }
    });
         if ($('#category_add_form').valid()) // check if form is valid
         {

         $("#category_add_form").submit();
         } else {

         return false;
         }
 }
   </script>
@endsection
