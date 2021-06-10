@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Submitted Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('lecturer') }}">Lecturer</a></li>
              <li class="breadcrumb-item active">Submitted Proposal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      
      <div class="card">

        <div class="card-body">
          <div class="container">
            
            <table class="table">
                <tr>
                    <th>Course Title</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th> </th>
                </tr>

                @foreach($list as $key => $data)
                <tr>
                    <td> @if (Auth::user()->role == 'superadmin')  
                            <a href="{{ route('spupdate', $data->id) }}">
                        @else
                            <a href="{{ route('update', $data->id) }}">
                        @endif
                            {{ $data->coursetitle }}</a></td>
                    <td>{{ $data->created_at }}</td>
                    <td>Pending</td>
                    <td>
                      
                      <form method="post" class="delete_form" action="{{route('spdestroy',$data->id)}}">
                            @csrf                                
                            @method('delete')
                            <a class="btn btn-outline-secondary" type="button" href="{{ route('spupdate', $data->id) }}" >Edit</a> 
                        <button href="{{route('spdestroy',$data->id)}}" class="btn btn-danger" type="submit">Delete</button>
                            
                            </form>
                            </td>
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
