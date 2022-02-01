@extends('layouts.admin')

@section('stylesheet')

@endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Add product</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">General Form</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{-- <div class="d-flex justify-content-center"> --}}
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('./product')}}" method='post'>
            <div class="card-body">
              <div class="form-group">
                <label for="itemId">Item Id</label>
                <input type="text" name="id" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Item Name</label>
                <input type="text" name="itemName" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Sales Price</label>
                <input type="text" name="#" class="form-control amount" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="text" name="#" class="form-control amount" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="#" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="#" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
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
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>






      @endsection

      @section('script')

      </script>
      @endsection