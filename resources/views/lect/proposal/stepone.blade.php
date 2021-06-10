@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('proposals.create.step.one.post') }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-header">Step 1: Basic Info</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="coursecode">Course Code:</label>
                        <input type="text" value="{{ $proposal->coursecode ?? '' }}" class="form-control" id="taskTitle"  name="coursecode">
                    </div>

                    <div class="form-group">
                        <label for="coursetitle">Course Title:</label>
                        <input type="text"  value="{{{ $proposal->coursetitle ?? '' }}}" class="form-control" id="productAmount" name="coursetitle"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Course Description:</label>
                        <textarea type="text"  class="form-control" id="taskDescription" name="description">{{{ $proposal->description ?? '' }}}</textarea>
                    </div>       
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
        </div>
    </div>

@endsection