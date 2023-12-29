<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ClientController::class, 'index']);
Route::get('/with_where', [ClientController::class, 'index_with_where_clause']);
Route::get('/order_by_email', [ClientController::class, 'index_order_by_email']);
Route::get('/order_by_id', [ClientController::class, 'index_order_by_id']);
