<!DOCTYPE html>
<html lang="en">
<head>
  <title>Garage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" integrity="sha512-9oXHUIbY5ggztQSpGM/F8ffumz2nTHkG81Qxvm/JJOlcj0nPu8T/A/vCXmlJRP2wt4iF3L2zL+P1rF2odicJ3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />d
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js" integrity="sha512-ec1IDrAZxPSKIe2wZpNhxoFIDjmqJ+Z5SGhbuXZrw+VheJu2MqqJfnYsCD8rf71sQfKYMF4JxNSnKCjDCZ/Hlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>

<div class="container">
<!-- Pills navs -->
<ul class="nav nav-pills mb-3" id="ex1" role="tablist">
@foreach($services as $service)
@if(!empty($service->category ))
  <li class="nav-item" role="presentation">
    <a
      class="nav-link  {{ $loop->first == 1 ? 'active' : '' }} "
      id="ex{{$service->id}}-tab-{{$service->id}}"
      data-mdb-toggle="pill"
      href="#ex{{$service->id}}-pills-{{$service->id}}"
      role="tab"
      aria-controls="ex{{$service->id}}-pills-{{$service->id}}"
      aria-selected="true"
      >{{$service->title}}</a
    >
  </li>
  @endif
@endforeach


<li class="nav-item" role="presentation">
<a
    class="nav-link"
    id="ex-tab-tyre"
    data-mdb-toggle="pill"
    href="#ex-pills-tyre"
    role="tab"
    aria-controls="ex-pills-tyre"
    aria-selected="true"
    >Tyre</a
>
</li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content" id="ex1-content">
@foreach($services as $service)
    @if(!empty($service->category ))
  <div class="tab-pane fade {{ $loop->first == 1 ? 'active show  ' : '' }}"  id="ex{{$service->id}}-pills-{{$service->id}}" role="tabpanel"  aria-labelledby="ex{{$service->id}}-tab-{{$service->id}}">
    {{$service->title}}
     
       @foreach($service->category as $cat)
					{{$cat->title}} <br>
				@endforeach
    
  </div>
  @endif
@endforeach
 <div class="tab-pane fade"  id="ex-pills-tyre" role="tabpanel"  aria-labelledby="ex-pills-tyre">
    
       <div class=d-flex>
            @csrf
            <div class="mb-3  mx-4">
                <label class="form-label" for="inputEmail">Makes</label>
                <select class="form-control" name="make" id="make_id">
                    <option value=""> Select Make</option>
                    @foreach($widths as $make)
                    <option value="{{$make->id}}">{{$make->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mx-4">
                <label class="form-label" for="inputPassword">Model</label>
                <select class="form-control" name="model" id="model-id">
                
                </select>
            </div>
            <div class="mb-3  mx-4">
                <label class="form-label" for="inputPassword">Fuel Types</label>
                <select class="form-control" name="fuel" id="fuel-id">
                   
                    
                </select>
            </div>
            <div class="mb-3  mx-4">
                <label class="form-label" for="inputPassword">Engine Types</label>
                <select class="form-control" name="engine" id="engine-id">
                   
                    
                </select>
            </div>
          
            <button type="submit" class="btn btn-primary btn-sm">Continue</button>
        </div>
      
  </div>
</div>
<!-- Pills content -->
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
  
            $('#make_id').on('change', function () {
                var idmake = this.value;
               
                $.ajax({
                    url: "{{url('api/fetch-profile')}}",
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
                    url: "{{url('api/fetch-rim')}}",
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
                    
                    }
                });
            });
            
             $('#fuel-id').on('change', function () {
                var idrim = this.value;
              
                $.ajax({
                    url: "{{url('api/fetch-speed')}}",
                    type: "POST",
                    data: {
                        rim_id: idrim,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                       
                        $('#engine-id').html('<option value="">-- Select Speed Capacity --</option>');
                        $.each(res.speeds, function (key, value) {
                            $("#engine-id").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    
                    }
                });
            });
            
        });
    </script>
</body>
</html>
