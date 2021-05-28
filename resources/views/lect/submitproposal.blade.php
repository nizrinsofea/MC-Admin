@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Submit Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('lect') }}">Lecturer</a></li>
              <li class="breadcrumb-item active">Submit Proposal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Courses</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="coursecode">Course Code</label>
                    <input type="coursecode" class="form-control" id="coursecode" placeholder="Enter Course Code">
                  </div>

                  <div class="form-group">
                    <label for="coursetitle">Course Title</label>
                    <input type="coursetitle" class="form-control" id="coursetitle" placeholder="Enter Course Title">
                  </div>
                  <div class="form-group">
                    <label for="courseinfo">Course Information</label>
                    <input type="courseinfo" class="form-control" id="courseinfo" placeholder="Enter Course Information">
                  </div>
                  <div class="form-group">
                    <label for="credithr">Course Credit Hour</label>
                    <input type="credithr" class="form-control" id="credithr" placeholder="Enter Credit Hour">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Course Outline</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

@endsection
