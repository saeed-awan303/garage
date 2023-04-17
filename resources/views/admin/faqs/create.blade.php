@extends('admin.layouts.master')
@section('title',$title)
@section('content')
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader" kt-hidden-height="54" style="">
      <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
          <!--begin::Page Heading-->
          <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
            <!--end::Page Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Manage FAQs's</a>
              </li>
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Add FAQs's</a>
              </li>
            </ul>
            <!--end::Breadcrumb-->
          </div>
          <!--end::Page Heading-->
        </div>
        <!--end::Info-->
      </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
        <!--begin::Card-->
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
          <div class="card-header" style="">
            <div class="card-title">
              <h3 class="card-label">FAQs's Add Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('faqs.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href="{{ route('faqs.store') }}"  onclick="event.preventDefault(); document.getElementById('faqs_add_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>Save</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::open([ 'route' => 'faqs.store','class'=>'form' ,"id"=>"faqs_add_form", 'enctype'=>'multipart/form-data']) }}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">FAQ's Info: </h3>
                   
                   
                    <div class="form-group row {{ $errors->has('faq_id') ? 'has-error' : '' }}">
                        <label class="col-3">FAQS's</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="faq_id" required>
                                <option value="">--! Select Parent FAQs !--</option>
                                @foreach ($faq_cats as $faq_cat)
                                     <option value="{{$faq_cat->id}}">{{$faq_cat->title}}</option>
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
@endsection
