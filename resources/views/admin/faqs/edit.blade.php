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
              <h3 class="card-label">FAQ's Edit Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('faqs.index') }}" class="btn btn-light-primary
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
            {{ Form::model($faqs, [ 'method' => 'PATCH','route' => ['faqs.update', $faqs->id],'class'=>'form' ,"id"=>"faqs_update_form", 'enctype'=>'multipart/form-data'])}}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Client Info: </h3>

                      <div class="form-group row {{ $errors->has('faq_id') ? 'has-error' : '' }}">
                        <label class="col-3">FAQS's</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="faq_id" required>
                                <option value="">--! Select Parent FAQs !--</option>
                                @foreach ($faq_cats as $faq_cat)
                                     <option value="{{$faq_cat->id}}" {{ $faqs->id = $faq_cat->id ? 'selected' : '' }}>{{$faq_cat->title}}</option>
                                @endforeach
                                <span class="text-danger">{{ $errors->first('faq_id') }}</span>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('question') ? 'has-error' : '' }}">
                      <label class="col-3">Question</label>
                      <div class="col-9">
                        {{ Form::textarea('question', null, ['class' => 'form-control form-control-solid','id'=>'question','placeholder'=>'Enter question','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('question') }}</span>
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('answer') ? 'has-error' : '' }}">
                      <label class="col-3">Answer</label>
                      <div class="col-9">
                        {{ Form::textarea('answer', null, ['class' => 'form-control form-control-solid','id'=>'answer','placeholder'=>'Enter answer','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('answer') }}</span>
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

         $("#faqs_update_form").validate({
         errorClass: "error fail-alert",
         validClass: "valid success-alert",
         rules: {
            faq_id: {
                required: true,
            },
            question: {
                required:true
            },
            answer:{
                required:true
            },


        },
        messages: {
            faq_id: {
                required: "Please select at least one category.",
            },
            question: {
                required: "Please enter question.",
            },
            answer: {
                required: "Please enter answer.",
            },

            // image: {
            //     required: "Please upload an image.",
            //     accept: "Please upload a valid image file.",
            // },
        }
    });
         if ($('#faqs_update_form').valid()) // check if form is valid
         {

         $("#faqs_update_form").submit();
         } else {

         return false;
         }
 }
   </script>
@endsection
