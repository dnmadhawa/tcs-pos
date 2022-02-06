<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Invoive</title>
  <style type="text/css">
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: black;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 8cm;
      margin: 0 auto;
      margin-top: -10px color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 13px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 5px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 7cm;
    }

    h1 {
      border-top: 1px solid black;
      border-bottom: 1px solid black;
      color: black;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
    }

    #project {
      float: left;
    }

    #project span {
      color: black;
      text-align: right;
      width: 70px;
      margin-right: 10px;
      display: inline-block;
      font-size: 12px;
    }

    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table th,
    table td {
      text-align: center;
    }


    table th {
      padding: 5px 5px;
      color: black;
      border-bottom: 1px solid black;
      white-space: nowrap;
      font-weight: normal;
    }

    table .service,
    table .desc {
      text-align: left;
    }

    table td {
      padding: 2px;
      text-align: right;
    }

    table td.service,
    table td.desc {
      vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 13px;
    }

    table td.grand {
      border-top: 1px solid black;
    }

    #notices .notice {
      text-align: center;
      color: black;
      font-size: 13px;
    }

    footer {
      color: black;
      width: 100%;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
  </style>
</head>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="{{ asset('dist/img/logo.png') }}">
      <div class="notice" style="font-size: 12px;">Supply Of Heavy Machinary Cylinder Repair Kits, Oilseals,O-rings,
        Dust seal,Pressure seal, Floating seals & Every kind of NOK Seals.</div>
    </div>
    <h1>INVOICE</h1>
    <div id="company" class="clearfix">
      <div>Shop Name</div>
      <div>Address</div>
      {{-- <div>Branches:</div> --}}
      <div>Phone Number</div>
      <div><a href="mailto:company@example.com">Email</a></div>
    </div>
    <div id="project">
      <div><span>INVOICE NO</span> #{{$data->id}}</div>
      <div><span>DATE</span>{{$data->created_at}}</div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <div class="mt-4">
            <div class="row text-600 text-white bgc-default-tp1 py-25">
              <th>
                <div class="d-none d-sm-block col-1">#</div>
              </th>
              <th>
                <div class="col-9 col-sm-3">Description</div>
              </th>
              <th>
                <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
              </th>
              <th>
                <div class="d-none d-sm-block col-4 col-sm-2">Discount</div>
              </th>
              <th>
                <div class="d-none d-sm-block col-sm-2">Unit Price</div>
              </th>
              <th>
                <div class="col-2">Amount</div>
              </th>
            </div>
        </tr>
        @php
        echo "<script>
          var x = ".$data."
        </script>";
        @endphp
        <script>
          var i = 1;
          x.invoice_items.forEach(items => {
            document.write("<tr>");
            document.write("<td>" + i + "</td>");
            document.write("<td>" + items['productname'] + "</td>");
            document.write("<td>" + items['quantity'] + "</td>");
            document.write("<td>" + items['pdiscount'] + "</td>");
            document.write("<td>" + items['price'] + "</td>");
            document.write("<td>" + items['sale_price'] + "</td>");
            document.write("</tr>");
            i++;
          });
        </script>
        {{-- <tr>
            <th class="service">NO.</th>
            <th class="desc">ITEM</th>
            <th>PRICE<br>(Rs.)</th>
            <th>QTY</th>
            <th>TOTAL <br>(Rs.)</th>
          </tr> --}}
      </thead>
      <tbody>
        {{-- echo $user_list; --}}
        <tr>
          <td colspan="5">SUBTOTAL</td>
          <td class="total">{{$data->subtotal}}</td>
        </tr>
        <tr>
          <td colspan="5">DISCOUNT</td>
          <td class="total">{{$data->discount}}</td>
        </tr>
        <tr>
          <td colspan="5" class="grand total">GRAND TOTAL</td>
          <td class="grand total" style="font-size: 13px;"><strong>{{$data->total}}</strong></td>
        </tr>
      </tbody>
    </table>





    </div>


    <div id="notices">


      <div>NOTICE:</div>
      <div class="notice">EXCHANGE WITH IN 7 DAYS</div>

      <div class="notice" style="font-size: 15px;"><strong>THANK YOU COME AGAIN!!</strong></div>


    </div>
  </main>
</body>

</html>