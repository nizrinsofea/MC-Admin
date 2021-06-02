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

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/submit', [App\Http\Controllers\Lect\LectController::class, 'submitProposal'])->name('spsubmit');
    Route::post('/submit', [App\Http\Controllers\Lect\LectController::class, 'proposal']);

    Route::get('/approve', function () {
        $create = DB::table('proposal')
                        ->select('id','coursecode','courseinfo','coursetitle','credithr','category','created_at')
                        ->get();
        return view('admin.approveproposal', ['create' => $create]);
    })->name('spapprove');
    Route::delete('/approve/{id}', [App\Http\Controllers\Admin\AdminController::class, 'courseDestroy'])->name('course.destroy');

    Route::get('/create', [App\Http\Controllers\Admin\AdminController::class, 'createAdmin'])->name('spcreate');
    Route::get('/create/{id}', [App\Http\Controllers\Admin\AdminController::class, 'userDestroy'])->name('user.destroy');
});

Route::middleware(['role:admin'])->group(function () {

    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    Route::get('/admin/approve', function () {
        $create = DB::table('proposal')
                        ->select('id','coursecode','courseinfo','coursetitle','credithr','category','created_at')
                        ->get();
        return view('admin.approveproposal', ['create' => $create]);
    })->name('approve');
});

Route::middleware(['role:lecturer'])->group(function () {

    Route::get('/lecturer', [App\Http\Controllers\Lect\LectController::class, 'index'])->name('lecturer');

    Route::get('/lecturer/submit', [App\Http\Controllers\Lect\LectController::class, 'submitProposal'])->name('submit');
    Route::post('/lecturer/submit', [App\Http\Controllers\Lect\LectController::class, 'proposalLect']);
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
