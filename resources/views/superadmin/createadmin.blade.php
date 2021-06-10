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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">List of admin</h5>
              </div>
              <div class="card-body overflow-auto">
                <!-- Loop through the database to list the admin username and password -->

                @foreach($list as $key => $data)
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{$data->username}}</label>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" value="{{$data->pwshow}}" id="{{$data->id}}" disabled>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="showPassword({{$data->id}})" >Show</button>
                        <a href="{{route('user.destroy',$data->id)}}" class="btn btn-danger">X</a>
                            <form method="post" class="delete_form" action="{{route('user.destroy',$data->id)}}">
                            @csrf                                
                            @method('delete')
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Add admin</h5>
              </div>
            
              <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6 offset-md-4">
                            <button class="btn btn-outline-secondary" type="button" onclick="createPassword()">Generate Password</button>
                          </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="pwshow" type="hidden" class="form-control" name="pwshow" required autocomplete="new-pwshow">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <input id="role" type="radio" class="" name="role" required value="admin" checked="checked">
                                <label for="role">Admin</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                          </div>
                        </div>
                    </form>
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
      function showPassword($test) {
        var x = document.getElementById($test);
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      function createPassword() {
        var length = 8,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retPassword = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retPassword += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("password").value = retPassword;
        document.getElementById("pwshow").value = retPassword;
      }
    </script>
@endsection
