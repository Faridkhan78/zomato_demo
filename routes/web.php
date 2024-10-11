<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data',[UserController::class,'data'])->name('datatable');

Route::get('/table',[UserController::class,'basictable'])->name('basictable');

// Route::get('/basicdatatable',[UserController::class,'basicdatatable'])->name('basicdatatable');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');

Route::view('register', 'register')->name('register');

//Route::view('login', 'login')->name('login');

Route::get('loginpage', [UserController::class, 'loginPage'])->name('loginpage');
Route::post('loginMatch', [UserController::class, 'login'])->name('loginMatch');

//Route::view('user/basicdatatable', 'basicdatatable')->name('basicdatatable');

Route::get('basicdatatable',[UserController::class,'viewUserall'])->name('basicdatatable');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

//Route::get('dashboard', [UserController::class, 'dashboardPage'])->name('dashboard');



//Route::view('dashboard', 'showDashboard')->name('dashboard');
Route::get('dashboard', [UserController::class, 'showDashboard'])->name('dashboard');



Route::delete('delete/{id}',[UserController::class,'deleteUser'])->name('delete');

// Route::get('dashboard',function(){
//     return view('user.dashboard');
// });

Route::post('/',[UserController::class,'updateUser'])->name('update');
Route::get('/updatePage/{id}',[UserController::class,'updatePage'])->name('update.page');

