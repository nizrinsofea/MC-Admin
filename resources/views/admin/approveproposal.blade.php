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
            <th>Start Date</th>
            <th>End Date</th>
            <th>Approval</th>
        </tr>

        @foreach($courses as $course)
        <tr>
            <td>{{ $course['KEY']['1']['VALUE'] }}</td>
            <td>{{ $course['KEY']['3']['VALUE'] }}</td>
            <td>{{ $course['KEY']['18']['VALUE'] }}</td>
            <td>{{ $course['KEY']['19']['VALUE'] }} </td>
            <td><button type="submit" class="btn btn-primary btn-flat">Approve</button> </td>
        </tr>
                
        @endforeach

        </table>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
