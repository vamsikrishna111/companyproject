 <!DOCTYPE html>
<head>
  <title>Bootstrap Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-3">
<div class="row">
  <div class="col-md-4">
  @foreach ($data as $value)
<p>DATE:{{$value->created_at}}</p>

@endforeach
  </div>

  <div class="col-md-4">
  @foreach ($data as $value)
<p>LOCATION:{{$value->location}}</p>

@endforeach
  </div>
</div>




</div>

</body>
<html> 











