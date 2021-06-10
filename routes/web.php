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
    if (Auth::user()->role == 'admin')
        return redirect('/admin');
    elseif (Auth::user()->role == 'lecturer')
        return redirect('/lecturer');
    else
        return redirect('/home');
});


Auth::routes();

Route::middleware(['role:superadmin'])->group(function () {

    Route::get('/home', [App\Http\Controllers\Superadmin\HomeController::class, 'index'])->name('home');
    
    Route::get('/submit', [App\Http\Controllers\Lect\ProposalController::class, 'index'])->name('spsubmit');
    Route::post('/submit', [App\Http\Controllers\Lect\ProposalController::class, 'store']);

    Route::get('/approve', [App\Http\Controllers\Superadmin\ApproveController::class, 'proposalList'])->name('spapprove');
    Route::get('/approve/{id}', [App\Http\Controllers\Superadmin\ApproveController::class, 'proposalDetails']);

    //Route::get('/approve/{id}', [App\Http\Controllers\Admin\AdminController::class, 'courseDestroy'])->name('course.destroy');

    Route::get('/search', function () {
        return view('superadmin.stafflist');
    })->name('search');
    Route::post('/search', [App\Http\Controllers\Superadmin\CreateAdminController::class, 'search']);

    Route::get('/submitted', [App\Http\Controllers\Lect\SubmittedController::class, 'submitList'])->name('spsubmitted');
    Route::get('/submitted/{id}', [App\Http\Controllers\Lect\SubmittedController::class, 'submitDetails']);
    Route::post('/submitted/{id}', [App\Http\Controllers\Lect\SubmittedController::class, 'update'])->name('spupdate');
    Route::delete('/submitted/{id}', [App\Http\Controllers\Lect\SubmittedController::class, 'destroy'])->name('spdestroy');

});

Route::middleware(['role:admin'])->group(function () {

    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    Route::get('/admin/approve', [App\Http\Controllers\Superadmin\ApproveController::class, 'proposalList'])->name('approve');
    Route::get('/admin/approve/{id}', [App\Http\Controllers\Superadmin\ApproveController::class, 'proposalDetails']);

});

Route::middleware(['role:lecturer'])->group(function () {

    Route::get('/lecturer', [App\Http\Controllers\Lect\LectController::class, 'index'])->name('lecturer');

    Route::get('/lecturer/submit', [App\Http\Controllers\Lect\LectController::class, 'submitProposal'])->name('submit');
    Route::post('/lecturer/submit', [App\Http\Controllers\Lect\LectController::class, 'proposalLect']);

    Route::get('/proposal', [App\Http\Controllers\Lect\ProposalController::class, 'index'])->name('proposals.index');
    
    Route::get('/lecturer/submitted', [App\Http\Controllers\Lect\SubmittedController::class, 'submitList'])->name('submitted');
    Route::get('/lecturer/submitted/{id}', [App\Http\Controllers\Lect\SubmittedController::class, 'submitDetails']);
    Route::post('/lecturer/submitted/{id}', [App\Http\Controllers\Lect\ProposalController::class, 'update'])->name('update');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
