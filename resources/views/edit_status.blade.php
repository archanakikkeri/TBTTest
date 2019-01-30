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
  <h2 class="text-center">TBT status update</h2>
        <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))
           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           </p>
         @endif
      @endforeach
  </div> 
  <form action="{{url('/update_status')}}" method="POST"> 
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">TBT Status:</label>
      <input type="text" class="form-control" value="{{$tbt_status['tbt_completed']}}" name="tbt_completed"> 
    </div>
    <input type="hidden" value="{{$tbt_status['team_id']}}" name="team_id">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
