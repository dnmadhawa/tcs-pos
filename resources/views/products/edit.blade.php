@extends('layouts.admin')

@section('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('content')

@include('inc.messages')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Edit product</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('product') }}">Product Table</a></li>
          <li class="breadcrumb-item"><a>Edit product</a></li>
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
          {{-- {{ Form::open(array('url' => '{{./product}}', 'method' => 'put')) }}
          {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              {{ Form::label('itemId', 'Item ID') }}
              {{ Form::text('itemId','',['class'=>'form-control', 'placeholder'=>'Enter Item ID','id'=>'exampleInputEmail1']) }}
            </div>
          </div>

          {{ Form::close() }} --}}


          {{-- --------------------------------------------------------------------- --}}
          <form action="{{ url('product',  $product->id  ) }}" method="post" onSubmit="return confirm('Do you want to Edit?') ">
            {{csrf_field()}}

            <div class="card-body">
              <div class="form-group">
                <label for="barcodeid">Barcode ID</label>
                <input type="text" name="bid" class="form-control" id="#" placeholder="Enter Barcode ID" value="{{ $product->barcodeid }}" readonly>
                {{-- <input type="hidden" name="bid" value="{{ $product->barcodeid }}"> --}}
              </div>
              <div class="form-group">
                <label for="productname">Product Name</label>
                <input type="text" name="name" class="form-control" id="#" placeholder="Enter Product Name" value="{{ $product->productname }}" style="text-transform: capitalize;" readonly>
                {{-- <input type="hidden" name="name" value="{{ $product->productname }}"> --}}
              </div>
              <div class="form-group">
                <label for="salesprice">Sales Price</label>
                <input type="text" name="sprice" class="form-control amount" id="#" placeholder="Enter Sales Price" value="{{ $product->salesprice }}">
                {{-- <input type="hidden" name="sprice" value="{{ $product->id }}"> --}}
              </div>
              <div class="form-group">
                <label for="purchaseprice">Purchase Price</label>
                <input type="text" name="pprice" class="form-control" id="#" placeholder="Enter Purchase Price" value="{{ $product->purchaseprice }}">
                {{-- <input type="hidden" name="pprice" value="{{ $product->id }}"> --}}
              </div>
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control amount" id="#" placeholder="Enter Quantity" value="{{ $product->quantity }}">
                {{-- <input type="hidden" name="quantity" value="{{ $product->id }}"> --}}
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              @method('PUT')
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