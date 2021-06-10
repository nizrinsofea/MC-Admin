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
            <form action="{{ route('proposals.create.step.four.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 3: Review Details</div>
                    <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Course Code:</td>
                                    <td><strong>{{$proposal->coursecode}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Course Title:</td>
                                    <td><strong>{{$proposal->coursetitle}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Course Description:</td>
                                    <td><strong>{{$proposal->description}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Course Credit Hour:</td>
                                    <td><strong>{{$proposal->credithr}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Course Category:</td>
                                    <td><strong>{{$proposal->category}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Course Outline:</td>
                                    <td><strong>{{$proposal->file_name}}</strong></td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('proposals.create.step.three') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection