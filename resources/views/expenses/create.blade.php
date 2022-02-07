@extends('layouts.admin')

@section('stylesheet')

@endsection

@section('content')

@include('inc.messages')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Expenses Payments</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{ url('product') }}">Product Table</a></li> --}}
          <li class="breadcrumb-item"><a>Expenses Payments</a></li>
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
          <form action="{{url('./expenses')}}" method='post'>
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Type</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                      <option value="eZcash">eZcash</option>
                      <option value="Electricity Bill">Electricity Bill</option>
                      <option value="Water Bill">Water Bill</option>
                      <option value="4">4</option>
                      <option value="6">5</option>
                    </select>
                  </div>
              <div class="form-group">
                <label for="accountnumber">Account Number</label>
                <input type="number" name="accnumber" class="form-control" id="accountnumber" placeholder="Enter Account Number" required>
              </div>
              <div class="form-group">
                <label for="referencenumber">Reference Number</label>
                <input type="text" name="refnumber" class="form-control" id="referencenumber" placeholder="Enter Reference Number" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="4" name="description">
                </textarea>
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

      <script>
        //message alert remover
        $("document").ready(function() {

          setTimeout(function() {
            $("div.alert").remove();

          }, 5000);

        })
      </script>
      @endsection