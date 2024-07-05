<?php

use App\Http\Controllers\web\ExpenseController;
use App\Http\Controllers\web\InvoiceController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\MemberController;
use App\Http\Controllers\web\RegisterController;
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



Route::get('staff/members/register', [RegisterController::class , 'register'])->name('register');
Route::post('staff/members/register/store', [RegisterController::class , 'store'])->name('register.store');


Route::get('staff/members/login', [LoginController::class , 'login'])->name('login');
Route::post('staff/members/login/store', [LoginController::class , 'store'])->name('login.store');


Route::group(['middleware' => 'auth:sanctum'] , function(){
Route::post('staff/members/logout' , [LoginController::class , 'logout'])->name('logout');
Route::get('/staff/members' , [MemberController::class , 'index'])->name('members-data');
Route::get('/staff/members/create' , [MemberController::class , 'create'])->name('create-member');
Route::post('/staff/members/store' , [MemberController::class , 'store'])->name('store-member');
Route::get('/staff/members/show/{id}' , [MemberController::class , 'show'])->name('show-member');
Route::get('/staff/members/edit/{id}' , [MemberController::class , 'edit'])->name('edit-member');
Route::put('/staff/members/update/{id}' , [MemberController::class , 'update'])->name('update-member');
Route::delete('/staff/members/destroy/{id}' , [MemberController::class , 'destroy'])->name('delete-member');




Route::get('/staff/expenses' , [ExpenseController::class , 'index'])->name('expenses-data');
Route::get('/staff/expenses/create' , [ExpenseController::class , 'create'])->name('create-expense');
Route::post('/staff/expenses/store' , [ExpenseController::class , 'store'])->name('store-expense');
Route::get('/staff/expenses/show/{id}' , [ExpenseController::class , 'show'])->name('show-expense');
Route::get('/staff/expenses/edit/{id}' , [ExpenseController::class , 'edit'])->name('edit-expense');
Route::put('/staff/expenses/update/{id}' , [ExpenseController::class , 'update'])->name('update-expense');
Route::delete('/staff/expenses/destroy/{id}' , [ExpenseController::class , 'destroy'])->name('delete-expense');



Route::get('/staff/invoices' , [InvoiceController::class , 'index'])->name('invoices-data');
Route::get('/staff/invoices/create-receipt/{id}' , [InvoiceController::class , 'createReceipt'])->name('create-invoice');
Route::post('/staff/invoices/store' , [InvoiceController::class , 'store'])->name('store-invoice');
Route::get('/staff/invoices/show/{id}' , [InvoiceController::class , 'show'])->name('show-invoice');
Route::get('/staff/invoices/edit/{id}' , [InvoiceController::class , 'edit'])->name('edit-invoice');
Route::put('/staff/invoices/update/{id}' , [InvoiceController::class , 'update'])->name('update-invoice');
Route::delete('/staff/invoices/destroy/{id}' , [InvoiceController::class , 'destroy'])->name('delete-invoice');
Route::get('/' , function(){
    return view('welcome');
})->name('welcome');


});






