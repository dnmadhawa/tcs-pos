@extends('layouts.admin')

@section('stylesheet')

@endsection

@section('content')

@include('inc.messages')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Utility Payments</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ url('product') }}">Product Table</a></li> --}}
                    <li class="breadcrumb-item"><a href="{{ url('utilitypayment/create') }}">Utility Payments</a></li>
                    <li class="breadcrumb-item"><a>add</a></li>
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


                    <form action="{{url('./PaymentType')}}" method='post'>
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="types">Payment Type</label>
                                <input type="text" name="name" class="form-control" id="types" style="text-transform: capitalize;" required>
                            </div>
                            <!-- /.card-body -->
                            <div class="form-group">
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
            </script>
            @endsection