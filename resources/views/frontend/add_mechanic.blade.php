@extends('layouts.frontend.app')
@section('main-content')
<!-- Booking flow progress start-->

<!-- Booking flow progress end-->
<main class="d-flex flex-column justify-content-start flex-grow-1 background_content">
    <div class="container">
        <div class="section_content py-5">
            <h2 class="text-center mb-3">Register yourself</h2>

                <form action="{{route('store.mechanic')}}" method="post">
                    @csrf
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputEmail">First Name</label>
                                    <input  type="text" class="form-control" name="first_name" placeholder="First name" value="{{ old('first_name') }}">
                                </div>
                                @error('first_name')
                                        <span style="color:red" class="">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">LAst Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
                                </div>
                                @error('last_name')
                                        <span style="color:red" class="">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Last name" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                        <span style="color:red" class="">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile #" required value="{{ old('mobile') }}">
                                </div>
                                @error('mobile')
                                        <span style="color:red" class="">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Post Code</label>
                                    <input type="text" class="form-control" name="post_code" placeholder="Post Code" value="{{ old('post_code') }}">
                                </div>
                                @error('post_code')
                                        <span style="color:red" class="">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Password">
                                </div>
                                @error('password')
                                        <span style="color:red" class="">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Retype Password</label>
                                    <input type="text" class="form-control" name="retype_password" placeholder="Retype password">

                                </div>
                                    @error('retype_password')
                                        <span style="color:red" class="">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-md-12 text-right mr-5">

                                <button type="submit" class="btn btn-primary ">Register Mechanic</button>

                            </div>
                    </div>


                </form>


        </div>
    </div>



</main>
<script>
    getLocation();
    function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("geo location is not supported on this browser");
  }
}

function showPosition(position) {
  $("#latitude").val(position.coords.latitude);
  $("#longitude").val(position.coords.longitude);
}
</script>
@endsection
