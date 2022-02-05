@extends('layouts.admin')

@section('stylesheet')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
@include('inc.messages')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Product Table</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a >Product Table</a></li>
          <li class="breadcrumb-item"><a href="{{ url('product/create') }}">Add product</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>



<div class=" card">
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Barcode ID</th>
          <th>Product Name</th>
          <th>Sales Price</th>
          <th>Purchase Price</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        {{-- check products in database --}}
      @if (count($products) > 0)
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->barcodeid }}</td>
          <td>{{ $product->productname  }}</td>
          <td>{{ $product->salesprice }}</td>
          <td>{{ $product->purchaseprice }}</td>
          <td>{{ $product->quantity }}</td>
          <td>
            <form action="{{ url('product',  $product->id  ) }}" method="POST" onSubmit="return confirm('Do you want to delete?') " >
              @csrf
          
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-block ">Delete</button>
              <a href="/product/{{ $product->id }}/edit" >
                <button type="button" class="btn btn-warning btn-block mt-1 ">Edit</button>
              </a>
          </form>
            {{-- <a href="/products/{{ $product->id }}" class="btn btn-default">Delete</a> --}}
          
          </td>
        </tr>
        @endforeach
      {{-- check products in database  else part--}}
      @else
          <p>No Products Found</p>
      {{-- endif --}}
      @endif
      </tbody>

      <tfoot>
        <tr>
          <th>ID</th>
          <th>Barcode ID</th>
          <th>Product Name</th>
          <th>Sales Price</th>
          <th>Purchase Price</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->


@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
  //message alert remover
    $("document").ready(function(){

    setTimeout(function(){
        $("div.alert").remove();
        
    }, 5000);

    })
</script>
@endsection