<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            'bid' => 'required|max:50',
            'name' => 'required|max:100',
            'sprice' => 'required',
            'pprice' => 'required',
            'quantity' => 'required',

        ]);

        $product->barcodeid = $request->bid;
        $product->productname = $request->name;
        $product->salesprice = $request->sprice;
        $product->purchaseprice = $request->pprice;
        $product->quantity = $request->quantity;
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
        $product=Product::find($id);
        dd($product);
        // return view('products.edit')->with('product', $product);
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
        $product=Product::find($id);
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