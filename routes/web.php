<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('dashboard', 'adminDashboard')->name('admin.dashboard');
    Route::get('dashboard', 'main_dashboard')->name('dashboard.show');

    Route::get('laboratories', 'laboratories')->name('laboratories.show');
    Route::post('laboratories', 'laboratories_store')->name('laboratories.store');
    Route::delete('laboratories/{id}', 'delete_labs')->name('delete.lab');

    Route::get('operations/{id}/edit_users', 'edit_users')->name('edit.users');
    Route::put('operations/{id}', 'update_users')->name('update.users');

    Route::delete('users/{id}', 'delete_users')->name('delete.users');
    Route::get('users', 'users')->name('users.show');
    Route::post('users', 'store_users')->name('store.users');
});

Route::any('dd', function (Request $request) {
    dd($request->all());
})->name('dd');
