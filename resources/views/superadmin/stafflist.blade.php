@extends('layouts.master')

@section('content')
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
                <form method="post" action="{{ route('search') }}">
                    @csrf
                    <div class="input-group">
                    <input class="form-control" id="staffsearch" name="staffsearch" type="text" placeholder="Search.." required>
                      <button class="btn btn-primary input-group-addon">Search</button>
                    </div>
                    
                    <br>
                </form> 
                <ul class="list-group" id="myList">
                @if(!empty($staff))
                    @foreach($staff as $data)
                      <a type="button" data-toggle="modal" data-target="#exampleModal">
                        <li class="list-group-item">{{ $data['staffName'] }}</li>
                      </a>
                      <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add as Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Name: {{ $data['staffName'] }} <br>
                                Email: {{ $data['staffEmail'] }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach
                @else
                    <p>No result</p>
                @endif
                </ul> 
            </div>
        </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">List of admin</h5>
              </div>
              <div class="card-body">
                  <div class="input-group">
                      <li class="list-group-item">Text Here</li>
                      <button class="input-group-addon">Remove</button>
                  </div>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Text Here</li>
                <a href="javascript:void(0);" onclick="Delete('')"><button class="btn btn-danger">Remove</button></a>
              
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
