@extends('layouts.admin')

@section('stylesheet')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
{{-- <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <form action=""></form>
        </div>
    </div>
</div> --}}

{{-- <div class="container">
    <div class="text-center">
        <h1>Products Table</h1>
    </div>
</div> --}}
<div class=" card">
  <div class="card-header">
    <h3 class="card-title">Product Table</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
          <td>X</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet Explorer 7</td>
          <td>Win XP SP2+</td>
          <td>7</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>AOL browser (AOL desktop)</td>
          <td>Win XP</td>
          <td>6</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Gecko</td>
          <td>Firefox 1.0</td>
          <td>Win 98+ / OSX.2+</td>
          <td>1.7</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Gecko</td>
          <td>Firefox 1.5</td>
          <td>Win 98+ / OSX.2+</td>
          <td>1.8</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Gecko</td>
          <td>Firefox 2.0</td>
          <td>Win 98+ / OSX.2+</td>
          <td>1.8</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Other browsers</td>
          <td>All others</td>
          <td>-</td>
          <td>-</td>
          <td>U</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
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
</script>
@endsection