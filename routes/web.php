<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/customers',[CustomerController::class,'index'])->name('customers');
// Route::get('/customers/create',[CustomerController::class,'create'])->name('customers.create');
// Route::post('/customers',[CustomerController::class,'store'])->name('customers.store');
// Route::get('/customers/{customer}',[CustomerController::class,'show'])->name('customers.show');


Route::middleware(['auth'])->group(function () {
Route::get('/home', [HomeController::class,'index'] )->name('home');
Route::get('/', [HomeController::class,'index'] );
Route::post('/', [HomeController::class,'index'] );

Route::get('/schemes',[SchemeController::class,'index'])->name('schemes');
Route::get('/schemes/create',[SchemeController::class,'create'])->name('schemes.create');
Route::post('/schemes',[SchemeController::class,'store'])->name('schemes.store');
Route::get('/schemes/{scheme}',[SchemeController::class,'show'])->name('schemes.show');

Route::get('/deposits',[EnrollmentController::class,'store'])->name('deposits.store');
Route::get('enrollments/{enrollment}/withdraw',[EnrollmentController::class, 'withdraw'])->name('withdraw');
Route::get('enrollments/{enrollment}',[EnrollmentController::class, 'show'])->name('enrollments.show');


});


