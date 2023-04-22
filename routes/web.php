<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('/welcome', function () {
   return view('welcome');
  });
// Route::get('/', function () {
//     return view('main');
// });
// Route::get('/add', function () {
//     return view('adduser');
// });
Route::get('/',[UserController::class,'index']);

Route::get('/adduser',[UserController::class,'adduser'])->name('adduser');

Route::post('/adduser',[UserController::class,'insert'])->name('insertuser');	

Route::get('/delete/{id}',[UserController::class,'destroy'])->name('delete');

Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');

Route::get('/single/{id}',[UserController::class,'single'])->name('single');

Route::post('/update/{id}',[UserController::class,'update'])->name('update');

Route::get('fetch-country', [UserController::class, 'index'])->name('fetchcountry');

Route::post('fetch-states', [UserController::class, 'fetchstate'])->name('fetchstate');

Route::post('fetch-cities', [UserController::class, 'fetchcity'])->name('fetchcity');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
