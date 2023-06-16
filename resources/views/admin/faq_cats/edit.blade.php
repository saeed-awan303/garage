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
              <h3 class="card-label">Faq Category Edit Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('faq_cats.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href="javascript::void(0)"  onclick="return validated()" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>update</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::model($faqs, [ 'method' => 'PATCH','route' => ['faq_cats.update', $faqs->id],'class'=>'form' ,"id"=>"faq_cats_update_form", 'enctype'=>'multipart/form-data'])}}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Client Info: </h3>
                    <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                      <label class="col-3">title</label>
                      <div class="col-9">
                        {{ Form::text('title', null, ['class' => 'form-control form-control-solid','id'=>'title','placeholder'=>'Enter title','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
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

         $("#faq_cats_update_form").validate({
         errorClass: "error fail-alert",
         validClass: "valid success-alert",
         rules: {
            title: {
                required: true,
            },

        },
        messages: {
            title: {
                required: "Please enter a title.",
            },

            // image: {
            //     required: "Please upload an image.",
            //     accept: "Please upload a valid image file.",
            // },
        }
    });
         if ($('#faq_cats_update_form').valid()) // check if form is valid
         {

         $("#faq_cats_update_form").submit();
         } else {

         return false;
         }
 }
   </script>
@endsection
