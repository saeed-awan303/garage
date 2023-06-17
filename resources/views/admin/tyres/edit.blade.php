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
              <h3 class="card-label">Tyre Edit Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('tyres.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href=""  onclick="event.preventDefault(); document.getElementById('tyre_update_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>update</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::model($tyre, [ 'method' => 'PATCH','route' => ['tyres.update', $tyre->id],'class'=>'form' ,"id"=>"tyre_update_form", 'enctype'=>'multipart/form-data'])}}
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


                    <div class="form-group row {{ $errors->has('type') ? 'has-error' : '' }}">
                        <label class="col-3">Service tyre</label>
                         <div class="col-9">
                            <select class="form-control form-control-solid" name="type" required>

                                <option value="">--! Select Type !--</option>

                                <option value="Rear" {{  $tyre->type == "Rear" ? 'selected' : '' }}>Rear </option>
                                <option value="Front" {{  $tyre->type == "Front" ? 'selected' : '' }}>Front</option>
                                <option value="Rear & Front" {{  $tyre->type  == "Rear & Front" ? 'selected' : '' }}>Rear & Front</option>

                                <span class="text-danger">{{ $errors->first('type') }}</span>
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
@endsection
