<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceItem;
use App\Models\Invoice;
use App\Models\Expenses;
use App\Models\utilitypayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $InvoiceItem = DB::table('invoice_items')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->day)
            ->count();

        $data += ['InvoiceItem' => $InvoiceItem];

        $total = DB::table('invoices')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->day)
            ->sum('total');
        $data += ['total' => $total];

        $expenses = DB::table('expenses')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->day)
            ->count();
        $data += ['expenses' => $expenses];

        $utilitypayment = DB::table('utilitypayments')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereDay('created_at', Carbon::now()->day)
            ->count();
        $data += ['utilitypayment' => $utilitypayment];
        return  $data;
    }

    public function monthAnalytics()
    {
        $data = [];
        $InvoiceItem = DB::table('invoice_items')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get()->count();

        $data += ['InvoiceItem' => $InvoiceItem];

        $total = DB::table('invoices')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total');
        $data += ['total' => $total];

        $expenses = DB::table('expenses')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $data += ['expenses' => $expenses];

        $utilitypayment = DB::table('utilitypayments')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $data += ['utilitypayment' => $utilitypayment];
        return  $data;
    }

    public function yearAnalytics()
    {
        $data = [];
        $InvoiceItem = DB::table('invoice_items')
            ->whereYear('created_at', Carbon::now()->year)
            ->get()->count();

        $data += ['InvoiceItem' => $InvoiceItem];

        $total = DB::table('invoices')
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total');
        $data += ['total' => $total];

        $expenses = DB::table('expenses')
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $data += ['expenses' => $expenses];

        $utilitypayment = DB::table('utilitypayments')
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $data += ['utilitypayment' => $utilitypayment];
        return  $data;
    }

    public function monthlyTotal()
    {
        $data = Invoice::selectRaw(' monthname(created_at) month, sum(total) total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();

        return $data;
    }
}
