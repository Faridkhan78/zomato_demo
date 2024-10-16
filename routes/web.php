<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/data',[UserController::class,'data'])->name('datatable');

Route::get('/table',[UserController::class,'basictable'])->name('basictable');

// Route::get('/basicdatatable',[UserController::class,'basicdatatable'])->name('basicdatatable');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');

Route::view('register', 'register')->name('register');

//Route::view('login', 'login')->name('login');

Route::get('/loginPage', [UserController::class, 'loginPage'])->name('loginpage');

//Route::get('/', [UserController::class, 'loginPage'])->name('login');


Route::post('loginMatch', [UserController::class, 'login'])->name('loginMatch');

//Route::view('user/basicdatatable', 'basicdatatable')->name('basicdatatable');

Route::get('basicdatatable',[UserController::class,'viewUserall'])->name('basicdatatable')->middleware('auth');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

//Route::get('dashboard', [UserController::class, 'dashboardPage'])->name('dashboard');



//Route::view('dashboard', 'showDashboard')->name('dashboard');
Route::get('dashboard', [UserController::class, 'showDashboard'])->name('dashboard')->middleware('auth');



Route::delete('delete/{id}',[UserController::class,'deleteUser'])->name('delete');

// Route::get('dashboard',function(){
//     return view('user.dashboard');
// });

Route::post('/',[UserController::class,'updateUser'])->name('update');
Route::get('/updatePage/{id}',[UserController::class,'updatePage'])->name('update.page');

Route::get('/updatePageA/{id}',[UserController::class,'updateApprove'])->name('update.approve');
Route::get('/updatePageD/{id}',[UserController::class,'updateDisapprove'])->name('update.disapprove');

Route::any('send-email/{id}',[UserController::class,'sendEmail'])->name('sendEmail');


// post 

// Route::get('/data',[UserController::class,'data'])->name('datatable');

Route::post('data',[PostController::class,'postregister'])->name('data');
Route::view('user.data', [PostController::class,'postregisterview'])->name('datatable');

Route::get('postview',[PostController::class,'viewPostall'])->name('postviewall')->middleware('auth');

Route::delete('delete/{id}',[PostController::class,'deletePost'])->name('delete');


 Route::post('/updatepost',[PostController::class,'updatePost'])->name('updatePost');
 Route::get('/updatePost/{id}',[PostController::class,'editpost'])->name('update.post');


 Route::get('/updatePageAP/{id}',[PostController::class,'updateApprovePost'])->name('update.approvepost');
 Route::get('/updatePageDP/{id}',[PostController::class,'updateDisapprovePost'])->name('update.disapprovepost');


// Review Card

// Route::get('/', function () {
//     return view('review_card');
// });

Route::get('/reviewCardData', [PostController::class,'reviewPost'])->name('reviewCardData');

Route::get('/', [PostController::class,'showCards'])->name('reviewCardData');