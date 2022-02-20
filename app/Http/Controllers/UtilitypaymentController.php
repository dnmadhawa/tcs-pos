<?php

namespace App\Http\Controllers;

use App\Models\utilitypayment;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class UtilitypaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Utilitypayments = Utilitypayment::all();
        // dd($products);
        return view('utilitypayments.index')->with('Utilitypayments', $Utilitypayments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentTypes = PaymentType::all();
        // dd($products);
        return view('utilitypayments.create')->with('paymentTypes', $paymentTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utilitypayment = new Utilitypayment();

        $validated = $request->validate([
            'type' => 'required',
            'accnumber' => 'required|max:20',
            'refnumber' => 'required',
            'amount' => 'required',
            // 'description' => '',

        ]);

        if ($request->type == 'Custom') {
            $utilitypayment->type = $request->costometype;
        } else {
            $utilitypayment->type = $request->type;
        }

        $utilitypayment->accnumber = $request->accnumber;
        $utilitypayment->refnumber = $request->refnumber;
        $utilitypayment->amount = $request->amount;
        $utilitypayment->description = $request->description;
        $utilitypayment->save();

        return redirect('utilitypayment/' . $utilitypayment->id)->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilitypayment = Utilitypayment::find($id);
        return View('utilitypayments.show')->with('utilitypayment', $utilitypayment);
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
