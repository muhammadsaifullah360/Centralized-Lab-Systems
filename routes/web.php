<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StripeController;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::get ( '/pay', [PaymentController::class,'index'])->name('pay');
Route::post ( '/pay', [PaymentController::class,'call'] );

Route::redirect('/', 'home');

Auth::routes();


Route::get('home/{id?}', [HomeController::class, 'index'])->name('home');

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

    Route::get('registered_User', 'registeredUser')->name('registeredUser');

});

Route::middleware(['auth', 'role:operator'])->controller(OperatorController::class)->prefix('operator')->group(function () {
    Route::get('dashboard', 'index')->name('operator.dashboard');

    Route::get('lab/appointment', 'show_appointmentList')->name('appointment');
    Route::get('edit/appointment/{id?}', 'edit_appointment')->name('edit.appointment');
    Route::post('update/appointment/{id?}', 'update_appointment')->name('update.appointment');
    Route::get('lab/tests', 'tests')->name('tests.dashboard');
    Route::post('lab/tests', 'addTest')->name('add.test');
    Route::delete('lab/test/{id}', 'deleteTest')->name('delete.test');
    Route::get('lab/about', 'about')->name('about.dashboard');
    Route::get('lab/test/{id}/edit', 'editTest')->name('edit.test');
    Route::put('lab/test/edit/{id}', 'updateTest')->name('update.test');
    Route::get('upload/report/{id}', 'uploadReport')->name('upload.report');
    Route::post('upload/report', 'upload')->name('upload');

});

Route::middleware(['auth'])->controller(PatientController::class)->group(function () {
    Route::get('patient/dashboard', 'index')->name('patient.dashboard');
    Route::get('book/test/{id?}', 'book')->name('appointment.dashboard');
    Route::post('book/test', 'store')->name('appointment.store');
    Route::post('book/test/{id?}', 'update')->name('appointment.update');
    Route::delete('appointment/{id}', 'delete_appointment')->name('appointment.delete');
    Route::get('all-appointments', 'appointmentList')->name('appointment.list');
    Route::get('view/appointment/{id?}', 'view_appointment')->name('view.appointment');


    Route::get('patient/payment/checkout', 'payment')->name('payment.form');

    Route::get('auth/changePassword', 'changePassword')->name('change');
    Route::post('/auth/changePassword', 'updatePassword')->name('update-password');

    Route::get('test/reports', 'test_report')->name('report');
    Route::get('report/{id?}', 'edit_report')->name('edit.report');
    Route::get('pdf/generate/{id?}', 'generatePDF')->name('pdf.generate');

    Route::post('appointment/rating', [RatingController::class, 'rating'])->name('rating');
    Route::post('appointment/book', [StripeController::class, 'book'])->name('stripe.book');

});

Route::any('dd', function (Request $request) {
    dd(Appointment::where('lab_id', auth()->user()->lab()->get()->first()->id)->get());
})->name('dd');
