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
            <form action="{{ route('proposals.create.step.two.post') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Step 2: Status & Stock</div>
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
                                <label for="credithr">Course Credit Hour</label><br/>
                                <input type="number"  value="{{{ $proposal->credithr ?? '' }}}" class="form-control" id="proposalAmount" name="credithr"/>
                                <!-- <label class="radio-inline"><input type="radio" name="status" value="1" {{{ (isset($proposal->status) && $proposal->status == '1') ? "checked" : "" }}}> Active</label>
                                <label class="radio-inline"><input type="radio" name="status" value="0" {{{ (isset($proposal->status) && $proposal->status == '0') ? "checked" : "" }}}> DeActive</label> -->
                            </div>

                            <div class="form-group">
                                <label for="category">Course Category</label>
                                <input type="text"  value="{{{ $proposal->category ?? '' }}}" class="form-control" id="proposalAmount" name="category"/>
                            </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('proposals.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>

                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection