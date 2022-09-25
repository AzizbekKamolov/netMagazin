<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return view('layouts.app');
});


Route::get('/dashboard', function (){
    return view('auth.login');
});
Route::get('/dashboard/register', function (){
    return view('auth.register');
});
Route::get('/logout', function (){
    auth()->logout();
    return redirect('/');
});

Route::post('/dashboard/register', [AuthController::class, 'register'])->name('register');
Route::post('/dashboard', [AuthController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth'], function (){

   Route::group(['middleware' => 'role:superAdmin'], function (){
       Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
       Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
       Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
       Route::get('/permission/edit/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
       Route::put('/permission/update/{permission}', [PermissionController::class, 'update'])->name('permission.update');
       Route::delete('/permission/delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');


       Route::get('/role', [RoleController::class, 'index'])->name('role');
       Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
       Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
       Route::get('/role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
       Route::put('/role/update/{role}', [RoleController::class, 'update'])->name('role.update');
       Route::delete('/role/delete/{role}', [RoleController::class, 'destroy'])->name('role.delete');

       Route::get('/user', [UserController::class, 'index'])->name('user');
       Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
       Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
       Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
       Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
       Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');

   });

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::post('/product/photo/delete', [ProductController::class, 'photoDelete'])->name('product.photo.delete');

});
