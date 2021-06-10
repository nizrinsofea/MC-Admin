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
      
      
      <div class="card">

        <div class="card-body">
          <div class="container">
            
            <table class="table">
                <tr>
                    <th>Course Title</th>
                    <th>Created At</th>
                    <th>Created By</th>
                </tr>

                @foreach($create as $key => $data)
                <tr>
                    <td><a href="/approve/{{ $data->id }}">{{ $data->coursetitle }}</a></td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->created_by }}</td>
                </tr>
                @endforeach
            </table>
            
          </div>
        </div>

      </div>
      
    </div>
      </div>
    </section>
  </div>
  

@endsection
