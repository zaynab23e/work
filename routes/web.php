<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CraftsmenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;

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


//login and register//________________________________________________________________________________________________________________
Route::post('/registeruser',                [AuthController::class,'registeruser'])->name('registeruser');
Route::get('/register',                [AuthController::class,'register'])->name('register');
//___________________________________________________________________________________________________________
Route::get('/',                [AuthController::class,'login'])->name('login');
Route::post('/login',                [AuthController::class,'loginuser'])->name('loginuser');

//all about craftsmens//___________________________________________________________________________________________________________
Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/craftsmens',      [CraftsmenController::class,'index'])   ->name('index');
Route::post('/store',          [CraftsmenController::class,'store'])   ->name('store');
Route::get('/create',          [CraftsmenController::class,'create'])  ->name('create');
Route::get('/show/{id}',       [CraftsmenController::class,'show'])    ->name('show-Craftsmen');
Route::get('/edit/{id}',       [CraftsmenController::class,'edit'])    ->name('edit');
Route::put('/update/{id}',     [CraftsmenController::class, 'update'])  ->name('update');
Route::delete('/destroy/{id}', [CraftsmenController::class,'destroy']) ->name('destroy');
});
//category//____________________________________________________________________________________________________________
Route::get('/categoty',                [CategoryController::class,'index'])   ->name('index_category');
Route::get('/show-category/{id}',      [CategoryController::class,'show'])   ->name('category.show');
Route::get('/create-category',         [CategoryController::class,'create'])  ->name('create_category');
Route::post('/store-category',         [CategoryController::class,'store'])   ->name('store_category');
Route::get('/edit-category/{id}',      [CategoryController::class,'edit'])    ->name('edit_category');
Route::put('/update-category/{id}',    [CategoryController::class, 'update'])  ->name('update_category');

//supcategoru//___________________________________________________________________________________________________________

Route::post('/store_cr',               [CategoryController::class,'store_cr'])   ->name('store_cr');
Route::get('/create_cr/{id}',          [CategoryController::class,'create_cr'])  ->name('create_cr');
Route::delete('/destroy-cr/{id}',         [CategoryController::class,'destroy_cr'])    ->name('destroy_cr');
Route::get('/edit-cr/{id}',            [CategoryController::class,'edit_cr'])       ->name('edit_cr');
Route::put('/update-cr/{id}',          [CategoryController::class, 'update_cr'])    ->name('update_cr');
//__________________________________________________________________________________________________________________________

//dashboard//___________________________________________________________________________________________________________
Route::get('/in',                [DashboardController::class,'countAll'])->name('in');
Route::get('/allph/{id}',                [CraftsmenController::class,'indexph'])->name('index.allph');
Route::get('/subscription-history/{id}', [CraftsmenController::class, 'subscriptionHistory'])->name('subscription.history');
Route::get('/dashboard/countAll', [DashboardController::class, 'countAll']);  

Route::get('/employees/expired', [DashboardController::class, 'expiredEmployees'])->name('employees.expired');
Route::get('/expired-employees', [DashboardController::class, 'expiredEmployees'])->name('expired.employees');

//Customer//___________________________________________________________________________________________________________

Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
//_______________________________________________________________________________________________________________________