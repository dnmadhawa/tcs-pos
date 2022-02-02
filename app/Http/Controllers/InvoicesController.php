<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        foreach ($request->items as $item) {

            if ($item['qty'] * $item['price'] - $item['discount'] == $item['salePrice']) {
                $total += $item['qty'] * $item['price'] - $item['discount'];
            } else {
                return "error";
            }
        }

        if ($total != $request->subTotal) {
            return "error";
        } elseif ($request->total != $request->subTotal - $request->tDiscount) {
            return "error";
        } elseif ($request->total + $request->balance != $request->payAmount) {
            return "error";
        }

        $invoice = new Invoice;
        $invoice->subtotal = $request->subTotal;
        $invoice->discount = $request->tDiscount;
        $invoice->total = $request->total;
        $invoice->pay_amount = $request->payAmount;
        $invoice->balance = $request->balance;
        $invoice->save();

        foreach ($request->items as $item) {
            $invoiceItem = new InvoiceItem;
            $invoiceItem->invoice_id = $invoice->id;
            $invoiceItem->barcodeid = $item['barcode'];
            $invoiceItem->productname = $item['name'];
            $invoiceItem->price = $item['price'];
            $invoiceItem->quantity = $item['qty'];
            $invoiceItem->pdiscount = $item['discount'];
            $invoiceItem->sale_price = $item['salePrice'];
            $invoiceItem->save();
        }
        // $invoiceItem = new InvoiceItem;
        // $invoiceItem->invoice_id = $invoice->id;
        // $invoiceItem->barcodeid = $request->items[0]['barcode'];
        // $invoiceItem->productname = $request->items[0]['name'];
        // $invoiceItem->price = $request->items[0]['price'];
        // $invoiceItem->quantity = $request->items[0]['qty'];
        // $invoiceItem->pdiscount = $request->items[0]['discount'];
        // $invoiceItem->sale_price = $request->items[0]['salePrice'];
        // $invoiceItem->save();
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = invoice::find($id);
        dd($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
