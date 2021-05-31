@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Approve Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
              <li class="breadcrumb-item active">Approve Proposal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <table id="customers">
        <tr>
            <th>Course Title</th>
            <th>Course Code</th>
            <th>Course Summary</th>
            <th>Credit Hour</th>
            <th>Created At</th>
            <th>Approval</th>
        </tr>

        @foreach($create as $key => $data)
        <tr>
            <td>{{ $data->courseTitle }}</td>
            <td>{{ $data->courseCode }}</td>
            <td>{{ $data->courseInfo }}</td>
            <td>{{ $data->courseCH }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
              <button onclick="location.href = 'http://localhost/moodle/webservice/rest/server.php?wstoken=2c8b1a438395fa3ff1d3e4b295b22ef2&wsfunction=core_course_create_courses&courses[0][fullname]={{ $data->coursetitle }}&courses[0][shortname]={{ $data->coursecode }}&courses[0][categoryid]={{ $data->category }}&courses[0][summary]={{ $data->courseinfo }}';" id="myButton" class="float-left submit-button" >Approve</button>
            </td>
        </tr>
        
        @endforeach

        </table>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
