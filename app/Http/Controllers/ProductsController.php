<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\NewCode;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::all();
        $products = Product::all();
        // dd($products);
        return view('products.index')->with('products', $products);
        // return dd(Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // dd($request->all());
        $product = new Product();

        $validated = $request->validate([
            'bid' => 'max:50|unique:products,barcodeid',
            'name' => 'required|max:100|unique:products,productname',
            'sprice' => 'required',
            'quantity' => 'required',

        ]);
        if (isset($request->pprice)) {
            $pprice = $request->pprice;
        } else {
            $pprice = 0;
        }


        if (isset($request->bid)) {
            $barcode = $request->bid;
        } else {
            $newcode = NewCode::find(1);
            $barcode = $newcode->prefix . $newcode->newcode;

            $newcode->newcode = $newcode->newcode + 1;
            $newcode->save();
        }


        $product->barcodeid = $barcode;
        $product->productname = $request->name;
        $product->salesprice = $request->sprice;
        $product->purchaseprice = $pprice;
        $product->quantity = $request->quantity;
        $product->warranty = $request->warranty;
        $product->save();

        return redirect('product/create')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        // dd($product);
        return view('products.edit')->with('product', $product);
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
        // dd($id);

        $validated = $request->validate([
            'bid' => 'required|max:50',
            'name' => 'required|max:100',
            'sprice' => 'required',
            'pprice' => 'required',
            'quantity' => 'required',

        ]);

        $product = Product::find($id);

        // dd($product);
        // $product->barcodeid = $request->input('bid');
        // $product->productname = $request->input('name');
        $product->salesprice = $request->input('sprice');
        $product->purchaseprice = $request->input('pprice');
        $product->quantity = $request->input('quantity');
        $product->warranty = $request->input('warranty');
        $product->save();

        return redirect('product')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);
        $product->delete();

        return redirect('/product')->with('success', 'Product Removed');
    }

    /**
     * api get data
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        return Product::all();
    }
}
