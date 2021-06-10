@extends('layouts.master')

@section('content')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create an Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
              <li class="breadcrumb-item active">Create an Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
<div class="content">
      <div class="container-fluid">
      @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif
        <div class="row">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Add admin</h5>
              </div>
              <div class="card-body">
              <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="search" required/>
                    <button type="submit">Search</button>
                </form>
                <br>
                @if(!empty($staffs))
                    @foreach ($staffs as $key => $data)
                        <div class="post-list">
                            <p>{{$data['staffName']}}</p>
                        </div>
                    @endforeach
                @else 
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
                @if(isset($details))
                <ul class="list-group" id="myList">
                  @foreach ($staff as $key => $data)
                  <li class="list-group-item">{{$data['staffName']}}</li>
                  @endforeach
                </ul>  
                @endif
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script>
@endsection
