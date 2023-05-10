<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Garage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="m-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-light text-right">
                <a href="{{route('addmechanic')}}">
                    <button type="button" class="btn btn-warning ml-2">Register Mechanic</button>
                </a>
            </div>
        </div>
        <form action="{{route('form.next2')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="inputEmail">Makes</label>
                <select class="form-control" name="make" id="make_id">
                    <option value=""> Select Make</option>
                    @foreach($makes as $make)
                    <option value="{{$make->id}}">{{$make->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputPassword">Model</label>
                <select class="form-control" name="model" id="model-id">

                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputPassword">Fuel Types</label>
                <select class="form-control" name="fuel" id="fuel-id">


                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputPassword">Engine Types</label>
                <select class="form-control" name="engine" id="engine-id">


                </select>
            </div>

            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#make_id').on('change', function () {

                var idmake = this.value;

                $.ajax({
                    url: "{{url('old/api/fetch-models')}}",
                    type: "POST",
                    data: {
                        make_id: idmake,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#model-id').html('<option value="">-- Select Models --</option>');
                        $.each(result.models, function (key, value) {
                            $("#model-id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });

                    }
                });
            });


            $('#model-id').on('change', function () {
                var idmodel = this.value;

                $.ajax({
                    url: "{{url('old/api/fetch-fuel')}}",
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
                            $("#fuel-id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                        $.each(res.engines, function (key, value) {
                            $("#engine-id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });

        });
    </script>
</div>
</body>
</html>
