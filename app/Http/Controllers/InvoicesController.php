<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('invoices.index');
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
            $product = Product::find($item['id']);
            if ($product->productname !=  $item['name'] && $product->salesprice !=  $item['price']) {
                return [
                    'isAdded' => false,
                    'error' => 'Item not match',
                ];
            }
            if ($item['qty'] * $item['price'] - $item['discount'] == $item['salePrice']) {
                $total += $item['qty'] * $item['price'] - $item['discount'];
            } else {
                return [
                    'isAdded' => false,
                    'error' => 'Item Sale price error',
                ];
            }
        }

        if ($total != $request->subTotal) {
            return [
                'isAdded' => false,
                'error' => 'Item Sub Total error',
            ];
        } elseif ($request->total != $request->subTotal - $request->tDiscount) {
            return [
                'isAdded' => false,
                'error' => 'Item total error',
            ];
        } elseif ($request->total + $request->balance != $request->payAmount) {
            return [
                'isAdded' => false,
                'error' => 'Item payAmount error',
            ];
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
            $invoiceItem->product_id = $item['id'];
            $invoiceItem->productname = $item['name'];
            $invoiceItem->price = $item['price'];
            $invoiceItem->quantity = $item['qty'];
            $invoiceItem->pdiscount = $item['discount'];
            $invoiceItem->sale_price = $item['salePrice'];
            $invoiceItem->save();

            $product = Product::find($item['id']);
            $temp = $product->quantity;
            $product->quantity = $temp - $item['qty'];
            $product->save();
        }
        return [
            'isAdded' => true,
            'id' => $invoice->id,
            'error' => '',
        ];
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
        $data = $invoice->load('InvoiceItems');
        // $users = $invoice->load('InvoiceItems')->get();
        // dd($users->toArray());
        // print_r($data);
        return View('invoices.show')->with('data', $data);
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
    }

    /**
     * get all data
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getInvoice()
    {
        return invoice::All();
    }
}
