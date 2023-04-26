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
        <h3 class="center">Add Mechanic</h3>
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
                </div>
                   <div class="col-md-12 text-right mr-5">
               
                    <button type="submit" class="btn btn-primary ">Register Mechanic</button>
             
            </div>
            </div>
         
        </form>
    </div>


</div>
</body>
</html>