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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

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
  <h2 class="text-center">Task Based Challenge College Status</h2>
        <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))
           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           </p>
         @endif
      @endforeach
  </div> 
  <!-- <form action="{{url('/collegelist')}}" method="POST"> 
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">College Name:</label>
      <input type="text" class="form-control" placeholder="Enter college name" name="college_name">
    </div>
    <div class="form-group">
      <label for="email">College Id:</label>
      <input type="INT" class="form-control" placeholder="Enter college Id" name="college_id">
    </div>
    <div class="form-group">
      <label for="pwd">Region:</label>
      <input type="text" class="form-control" placeholder="Enter region" name="region">
    </div>
    <div class="form-group">
      <label for="email">Lab Inaugurated:</label>
      <input type="text" class="form-control" placeholder="lab inaugurated?" name="lab_inaugurated">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form> -->

</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped" id="tbt_status">
        <thead>
          <tr>
            <th>Team id</th>
            <th>Task0-NOC</th>
            <th>Task1</th>
            <th>Task2</th>
            <th>Task3</th>
            <th>Task4</th>
            <th>Task5</th>
            <th>Task6</th>
            <th>Completed</th>
        </thead>
        <tbody>
        @foreach ($tbt_status as $tbt)
          <tr>
            <td>{{$tbt['team_id']}}</td>
            <td>{{$tbt['task0_noc']}}</td>
            <td>{{$tbt['task1_status']}}</td>
            <td>{{$tbt['task2_status']}}</td>
            <td>{{$tbt['task3_status']}}</td>
            <td>{{$tbt['task4_status']}}</td>
            <td>{{$tbt['task5_status']}}</td>
            <td>{{$tbt['task6_status']}}</td>
            <td>{{$tbt['tbt_completed']}}</td>
            <td><a href="{{url('/edit_status/'.base64_encode(convert_uuencode($tbt['team_id'])))}}">
              <i class="fa fa-edit" style="font-size:18px"></i>
            </a>
          </tr>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
  <script>
    $(document).ready( function () {
      $('#tbt_status').DataTable({
/*        aaSorting: [[0, 'desc']]
    });*/

        aaSorting: [[2, 'asc']],
        bPaginate: true,
        bFilter: false,
        bInfo: false,
        bSortable: true, 
        bRetrieve: true,
        aoColumnDefs: [
            { "aTargets": [ 0 ], "bSortable": true },
            { "aTargets": [ 1 ], "bSortable": true },
            { "aTargets": [ 2 ], "bSortable": true },
            { "aTargets": [ 3 ], "bSortable": false }
        ]
    }); 

  });
  </script>
</body>
</html>
