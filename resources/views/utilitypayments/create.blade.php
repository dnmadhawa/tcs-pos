@extends('layouts.admin')

@section('stylesheet')

@endsection

@section('content')

@include('inc.messages')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Utility Payments</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{ url('product') }}">Product Table</a></li> --}}
          <li class="breadcrumb-item"><a>Utility Payments</a></li>
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

          <form action="{{url('./utilitypayment')}}" method='post'>
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="selectType">Select Type</label>
                    <select class="form-control" id="selectType" name="type" onchange="changeStatus()">
                      <option value="Dialog Mobile">Dialog Mobile</option>
                      <option value="Dialog TV">Dialog TV</option>
                      <option value="Dialog HBB/CDMA">Dialog HBB/CDMA</option>
                      <option value="4">Dialog WiMax</option>
                      <option value="4">Hutch</option>
                      <option value="4">Airtel</option>
                      <option value="4">Lanka Bell</option>
                      <option value="4">Ceylon Electricity Board</option>
                      <option value="4">Ceylon Electricity Company</option>
                      <option value="4">National Water Supply</option>
                      <option value="4">Touch Reload</option>
                      <option value="4">Touch Cale Parking Topup</option>
                      <option value="4"></option>
                      <option value="4">Dialog WiMax</option>
                      <option value="Custom">Custom</option>
                    </select>
                    <input type="hidden" name="costometype" class="form-control " placeholder="Enter Bill Type" id="costometype" style=" margin-top:5px;">
                    {{-- <div id="hidden_div" style="display: none;">Hello hidden content</div> --}}
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
                <label for="amount">Pay Amount</label>
                <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Pay Amount" required>
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

        });
        function changeStatus(){
            var status = document.getElementById("selectType");
            if(status.value=="Custom"){
                document.getElementById("costometype").type="show";
            }
            else{
                document.getElementById("costometype").type="hidden";
            }
            }
      </script>
      @endsection