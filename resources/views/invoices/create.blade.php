@extends('layouts.admin')

@section('stylesheet')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Billing</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Billing</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div id="app" class="p-2">
    <invoice-form>
    </invoice-form>
</div>


@endsection

@section('script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}">
</script>
<script>
    // $('.select2').selectpicker();
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    })
    $(document).on("select2:open", () => {
        document.querySelector(".select2-container--open .select2-search__field").focus()
    })
</script>
@endsection