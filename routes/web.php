<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\OperatorController;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:admin'])->controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('dashboard', 'index')->name('admin.dashboard');

    Route::get('labs', [LabController::class, 'index'])->name('admin.lab.index');
    Route::post('lab', 'storeLab')->name('admin.lab.store');
    Route::delete('labs/{id}', 'deleteLab')->name('delete.lab');
    Route::get('lab/{id}/edit', 'editLab')->name('edit.labs');
    Route::put('lab/edit/{id}', 'updateLab')->name('update.labs');

    Route::get('lab/users', 'users')->name('admin.lab.user.index');
    Route::get('user/{id}/edit', 'editUser')->name('edit.users');
    Route::put('user/edit/{id}', 'updateUser')->name('update.users');
    Route::delete('users/{id}', 'deleteUser')->name('delete.users');
    Route::post('lab/users', 'storeUser')->name('user.store');
});

Route::middleware(['auth', 'role:operator'])->controller(OperatorController::class)->prefix('operator')->group(function () {
    Route::get('dashboard', 'index')->name('operator.dashboard');
    Route::get('lab/appointment', 'appointmentList')->name('appointment.dashboard');
    Route::get('lab/test/tests', 'tests')->name('tests.dashboard');
    Route::post('lab/test/tests', 'addTest')->name('add.test');
    Route::delete('lab/test/tests/{id}', 'deleteTest')->name('delete.test');
    Route::get('lab/about', 'about')->name('about.dashboard');
});

Route::any('dd', function (Request $request) {
//    dd($request->all());
//    dd(User::whereDoesntHave('lab')->get()->last()->id);
    $users = User::whereDoesntHave('lab')->get();
    $ids = [];
    foreach ($users as $user) {
        $ids[] = $user->id;
    }
    dd($ids);
//    dd(auth()->user()->lab()->get()->first()->id);
})->name('dd');
