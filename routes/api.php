<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductsController::class, 'getProducts']);
Route::get('/invoices', [InvoicesController::class, 'getInvoice']);
Route::post('/saveinvoice', [InvoicesController::class, 'store']);
Route::get('/invoiceItem/{invoiceId}', [InvoiceItemController::class, 'getInvoiceItem']);
Route::get('/dashboardData', [DashboardController::class, 'dayAnalytics']);
Route::get('/dashboardMonth', [DashboardController::class, 'monthAnalytics']);
Route::get('/dashboardYear', [DashboardController::class, 'yearAnalytics']);
