<?php

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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function () {
    if (Auth::user()->role == 'lecturer')
        return redirect('/lecturer');
    elseif (Auth::user()->role == 'superadmin')
        return redirect('/home');
    else
        return redirect('/admin');
});


Auth::routes();

Route::middleware(['role:superadmin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/submit', [App\Http\Controllers\Lect\LectController::class, 'submitProposal'])->name('spsubmit');
    Route::get('/approve', [App\Http\Controllers\Admin\CourseController::class, 'course'])->name('spapprove');
    Route::get('/create', [App\Http\Controllers\Admin\AdminController::class, 'createAdmin'])->name('spcreate');
    Route::get('/create/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/approve', [App\Http\Controllers\Admin\CourseController::class, 'course'])->name('approve');
});

Route::middleware(['role:lecturer'])->group(function () {
    Route::get('/lecturer', [App\Http\Controllers\Lect\LectController::class, 'index'])->name('lect');
    Route::get('/lecturer/submit', [App\Http\Controllers\Lect\LectController::class, 'submitProposal'])->name('submit');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
