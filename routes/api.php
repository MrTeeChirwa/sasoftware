<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Users\EmployeeController;

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

// Unprotected, Public APIs

Route::post('employee/storeOrUpdate', [EmployeeController::class, 'storeOrUpdate'])
    ->name('employee.store');
Route::get('employee/employees', [EmployeeController::class, 'employees']);
