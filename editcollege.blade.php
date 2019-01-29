<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test TBT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">


  <style type="text/css">
    .row{
      background-color: #eee;
    }
    h2 {
      background-color: #333;
      color: #fff;
    }
    .fa {
      font-size: 20px;
      padding: 1px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Edit College details</h2>
        <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))
           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           </p>
         @endif
      @endforeach
  </div> 
  <form action="{{url('/update_college')}}" method="POST"> 
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">College Name:</label>
      <input type="text" class="form-control" value="{{$college_data['college_name']}}" placeholder="Enter college name" name="college_name">
    </div>
    <input type="hidden" value="{{$college_data['college_id']}}" name="college_id">
    <div class="form-group">
      <label for="pwd">Region:</label>
      <input type="text" class="form-control" value="{{$college_data['region']}}" placeholder="Enter region" name="region">
    </div>
    <div class="form-group">
      <label for="email">Lab Inaugurated:</label>
      <input type="text" class="form-control" value="{{$college_data['lab_inaugurated']}}" placeholder="lab inaugurated?" name="lab_inaugurated">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
