<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;


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
    return view('index');

});
Route::get('/register',[HomeController::class,'register'])->name('register');
Route::post('/doregister',[HomeController::class,'doregister'])->name('doregister');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/dologin',[HomeController::class,'dologin'])->name('dologin');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

Route::get('/addcategory',[CategoryController::class,'addcategory'])->name('addcategory');
Route::post('/doaddcategory',[CategoryController::class,'doaddcategory'])->name('doaddcategory');
Route::get('/viewcategory',[CategoryController::class,'viewcategory'])->name('viewcategory');
Route::get('/editcategory/{id}',[CategoryController::class,'editcategory'])->name('editcategory');
Route::post('/updatecategory/{id}',[CategoryController::class,'updatecategory'])->name('updatecategory');
Route::get('/deletecategory/{id}',[CategoryController::class,'deletecategory'])->name('deletecategory');
// Route::get('/viewarticle/{category_id}', [CategoryController::class, 'viewArticle'])->name('viewarticle');
Route::get('/viewarticles/{category_id}', [CategoryController::class, 'viewArticle'])->name('viewarticles');



Route::get('/addarticle/{category_id}',[ArticleController::class,'addarticle'])->name('addarticle');
Route::post('/doaddarticle',[ArticleController::class,'doaddarticle'])->name('doaddarticle');
Route::get('/viewarticle',[ArticleController::class,'viewarticle'])->name('viewarticle');
Route::get('/articleshows/{id}', [ArticleController::class, 'articleshow'])->name('articleshow');
Route::get('/editarticle/{id}',[ArticleController::class,'editarticle'])->name('editarticle');
Route::post('/updatearticle/{id}',[ArticleController::class,'updatearticle'])->name('updatearticle');
Route::get('/deletearticle/{id}',[ArticleController::class,'deletearticle'])->name('deletearticle');

