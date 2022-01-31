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
                <h1 class="m-0">Invoice</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- content -->
<div class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="card p-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>
                                <div class="form-group">
                                    <select class="select2" style="width: 100%;">
                                        <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Clean database</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-warning">70%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <div class="form-group">
                    <label>Sub Total</label>
                    <input type="text" class="form-control" value="0" readonly>
                </div>
                <div class="form-group">
                    <label>Discount</label>
                    <input type="text" class="form-control" value="0">
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control" value="0" readonly>
                </div>
            </div>
            <div class="card p-3">
                <div class="form-group">
                    <label>Pay Amount</label>
                    <input type="text" class="form-control" value="0">
                </div>
                <div class="form-group">
                    <label>Balance</label>
                    <input type="text" class="form-control" value="0" readonly>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}">
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    })
</script>
@endsection