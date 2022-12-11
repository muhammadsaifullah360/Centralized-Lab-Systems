<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'home');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');


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
    Route::get('lab/test/{id}/edit', 'editTest')->name('edit.test');
    Route::put('lab/test/edit/{id}', 'updateTest')->name('update.test');
});

Route::middleware(['auth', 'role:user'])->controller(PatientController::class)->prefix('patient')->group(function () {
    Route::get('dashboard', 'index')->name('patient.dashboard');
    Route::get('appointment~', 'appointment')->name('appointment.dashboard');
});

Route::any('dd', function (Request $request) {
//    $search = str($request->get('search'))->trim()->lower();
//    $results = Test::where('name', 'like', '%' . $search . '%')->get();
//    dd($results);
//    dd($request->all());
//    dd(User::whereDoesntHave('lab')->get()->last()->id);
//    dd(auth()->user()->lab()->get()->first()->id);
})->name('dd');
