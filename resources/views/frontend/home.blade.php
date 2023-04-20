<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Vertical Form Layout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="m-4">
    <div class="container">
        <form action="/examples/actions/confirmation.php" method="post">
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
                <select class="form-control" name="make" id="model-id">
                
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputPassword">Model</label>
                <select class="form-control" name="make" id="fuel-id">
                   
                    
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputPassword">Engine Types</label>
                <select class="form-control" name="make" id="engine-id">
                   
                    
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
                    url: "{{url('api/fetch-models')}}",
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
                    url: "{{url('api/fetch-fuel')}}",
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