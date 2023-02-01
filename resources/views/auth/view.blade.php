@include('auth.header')
<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap-grid.min.css" integrity="sha512-JQksK36WdRekVrvdxNyV3B0Q1huqbTkIQNbz1dlcFVgNynEMRl0F8OSqOGdVppLUDIvsOejhr/W5L3G/b3J+8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    
<div class="content-wrapper">
    <!-- <section class="content"> -->
   
      <div class="container-fluid">
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="container-fluid">
    <div class="row">
        <div class="col-12 table-responsive">
        <a href="viewadd" class="btn btn-dark float-end my-2"><i class="fa fa-plus"></i>Add Data</a>
            <table class="table table-bordered user_datatable" style="background-color:white">
                <thead>
                    <tr>
                        <th>Sr. no.</th>
                        <th>User id</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>GENDER</th>
                        <TH>MOBILE NO</TH>
                        <TH>RESIDENTIAL ADDRESS</TH>
                        <TH>PERMENANT ADDRESS</TH>
                        <TH>DOB</TH>
                        <th>DOJ</th>
                        <TH>DEPARTMENT</TH>
                        <TH>JOB TITLE</TH>
                        <TH>JOB TYPE</TH>
                        <th width="500px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
      var table = $('.user_datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('emp.index') }}",
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
              {data: 'user_id', name: 'user_id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              
              {data: 'gender', name: 'gender'},
              
              {data: 'mno', name: 'mno'},
              {data: 'add1', name: 'add1'},
              {data: 'add2', name: 'add2'},
              {data: 'dob', name: 'dob'},
              {data: 'doj', name: 'doj'},
              {data: 'dept', name: 'dept'},
              {data: 'designation', name: 'designation'},
              {data: 'type', name: 'type'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
  </script>
  </div>
  </div>
  </div>
  </div>
</body>
</html>
