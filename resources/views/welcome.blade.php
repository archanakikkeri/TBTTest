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
  <h2 class="text-center">e-Yantra Lab Setup Initiative Program</h2>
    <p>e-Yantra Lab Setup Initiative (eLSI) is a college level program under which colleges are encouraged to setup robotics labs. </p>
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
    <table class="table table-striped" id="college_list">
        <thead>
          <tr>
            <th>College Name</th>
            <th>College Id</th>
            <th>Region</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($college_list as $colleges)
          <tr>
            <td>{{$colleges['college_name']}}</td>
            <td>{{$colleges['college_id']}}</td>
            <td>{{$colleges['region']}}</td>
            <td><a href="{{url('/edit_college/'.base64_encode(convert_uuencode($colleges['college_id'])))}}">
              <i class="fa fa-edit" style="font-size:18px"></i>
            </a>

            <a href="{{url('/delete_college/'.base64_encode(convert_uuencode($colleges['college_id'])))}}">
              <i class="fa fa-trash" style="font-size:18px"></i>
            </a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
  <script>
    $(document).ready( function () {
      $('#college_list').DataTable({
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
