<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::get('/categories', function () {
    return view('categories');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/job_single', function () {
    return view('job_single');
});
Route::get('/new_job', function () {
    return view('new_job');
});

Route::get('adminpanel', function () {
    return view('adminpanel');
})->name('admin.index');
//category Route
Route::resource('categories', CategoryController::class);
//About Route
Route::resource('abouts', AboutController::class);
//contact route
Route::resource('contacts', ContactController::class);
//team Route
Route::resource('teams', TeamController::class);
//Question Route
Route::resource('questions', QuestionController::class);
//Services Route
Route::resource('services', ServiceController::class);
//testimony Route
Route::resource('testimonies', TestimonyController::class);
//User Route
Route::resource('users', UserController::class);

