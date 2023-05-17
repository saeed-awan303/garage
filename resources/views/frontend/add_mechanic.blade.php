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
                    <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputEmail">First Name</label>
                                    <input  type="text" class="form-control" name="first_name" placeholder="First name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">LAst Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile #" requies>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Post Code</label>
                                    <input type="text" class="form-control" name="post_code" placeholder="Post Code">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Post Code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="inputPassword">Retype Password</label>
                                    <input type="text" class="form-control" name="password2" placeholder="Post Code">
                                </div>
                            </div> --}}

                            <div class="col-md-12 text-right mr-5">

                                <button type="submit" class="btn btn-primary ">Register Mechanic</button>

                            </div>
                    </div>


                </form>


        </div>
    </div>



</main>

@endsection
