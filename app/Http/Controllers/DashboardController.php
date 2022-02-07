<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceItem;
use App\Models\Invoice;
use Carbon\Carbon;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dayAnalytics()
    {

        $data = [];
        $InvoiceItem =  InvoiceItem::whereDay('created_at', now()->day)->get()->count();

        $data += ['InvoiceItem' => $InvoiceItem];

        $total =  Invoice::whereDay('created_at', now()->day)->get()->sum('total');
        $data += ['total' => $total];
        return  $data;
    }

    public function monthAnalytics()
    {

        $data = [];
        $InvoiceItem =  InvoiceItem::whereDay('created_at', now()->month)->get()->count();

        $data += ['InvoiceItem' => $InvoiceItem];

        $total =  Invoice::whereDay('created_at', now()->month)->get()->sum('total');
        $data += ['total' => $total];
        return  $data;
    }

    public function yearAnalytics()
    {

        $data = [];
        $InvoiceItem =  InvoiceItem::whereDay('created_at', now()->year)->get()->count();

        $data += ['InvoiceItem' => $InvoiceItem];

        $total =  Invoice::whereDay('created_at', now()->year)->get()->sum('total');
        $data += ['total' => $total];
        return  $data;
    }
}
