@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('lecturer') }}">Lecturer</a></li>
              <li class="breadcrumb-item active">Update Proposal</li>
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

        <div class="card-header">
          <h5 class="m-0">Course Information</h5>
        </div>
        
        @foreach($details as $key => $data)
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="coursecode">Course Code</label>
                  <input type="text" name="coursecode" class="form-control" value="{{ $data->coursecode }}" id="coursecode" placeholder="Enter Course Code">
                </div>
                <div class="form-group">
                  <label for="coursetitle">Course Title</label>
                  <input type="text" name="coursetitle" class="form-control" value="{{ $data->coursetitle }}" id="coursetitle" placeholder="Enter Course Title">
                </div>
                <div class="form-group">
                  <label for="credithr">Course Credit Hour</label>
                  <input type="number" name="credithr" class="form-control" value="{{ $data->credithr }}" id="credithr" placeholder="Enter Credit Hour">
                </div>
                <div class="form-group">
                  <label for="category">Course Category</label>
                  <input type="number" name="category" class="form-control" value="{{ $data->category }}" id="category" placeholder="Enter Category">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="description">Course Description</label>
                  <textarea name="description" id="description" class="form-control" rows="10" required>{{ $data->description }}</textarea>
                </div>         
              </div>
            </div>
          </div>
        </div>

        <div class="card-header">
          <h5 class="m-0">Course Outline</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="custom-file">
              <input class="custom-file-label" type="file" name="file"  id="chooseFile">
              <label for="chooseFile" class="custom-file-label">Upload Course Outline</label>
            </div>
          </div>
        </div>

        <div class="card-header">
          <h5 class="m-0">Course Assessments</h5>
        </div>
        <div class="card-body">
          <div class="container"> 
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="quizzes"  id="quizzes" value="">
                <label for="quizzes" class="form-check-label">Quizzes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="final"  id="final" value="">
                <label for="final" class="form-check-label">Final Exam</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="presentation"  id="presentation" value="">
                <label for="presentation" class="form-check-label">Presentation</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="test"  id="test" value="">
                <label for="test" class="form-check-label">Test</label>
              </div>
          </div>
        </div>

        <div class="card-header">
          <h5 class="m-0">Course Rationale</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="form-group">
              <label for="learningoutcomes">Learning Outcomes</label>
              <h6>Student learning outcomes for this course that are tied to course content and assignments. Key Question: What do you want student to know or be able to do at the end of this course?</h6>
              <textarea name="learningoutcomes" class="form-control" rows="5" id="learningoutcomes">{{ $data->learningoutcomes }}</textarea>
            </div>
            <div class="form-group">
              <label for="coursejustification">Course Justification</label>
              <h6>Provide a clear and compelling rationale for any proposed new course. The justification should state explicitly and clearly how the new course relates to the college and department plans.</h6>
              <textarea name="coursejustification" class="form-control" rows="5" id="coursejustification">{{ $data->coursejustification }}</textarea>
            </div>
            <div class="form-group">
              <label for="courseimpact">Impact on the Curriculum</label>
              <h6>Review your current course offerings and requirements in light of the new course. How will it improve your program and enhance the educational outcomes you seek to accomplish?</h6>
              <textarea name="courseimpact" class="form-control" rows="5" id="courseimpact">{{ $data->courseimpact }}</textarea>
            </div>
            <div class="form-group">
              <label for="created_by">Proposed by</label>
              <input name="created_by" class="form-control" value="{{ $data->created_by }}" id="created_by" readonly>
            </div>
          </div>
        </div>
        @endforeach

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </div>
      </form>
      
    </div>
      </div>
    </section>
  </div>
  

@endsection
