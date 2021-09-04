<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TypeController;
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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/category', [HomeController::class, 'getCategories'])->name('categories');
Route::get('/service', [HomeController::class, 'getServices'])->name('services');
Route::get('/about', [HomeController::class, 'getAbout'])->name('about');
Route::get('/team', [HomeController::class, 'getTeam'])->name('team');
Route::get('/Q&A', [HomeController::class, 'getQandA'])->name('Q&A');
Route::get('/contact', [HomeController::class, 'getContact'])->name('contact');
Route::get('/job_single', [HomeController::class, 'getSingleJob'])->name('singlejob');
Route::get('/new_job', [HomeController::class, 'getNewJob'])->name('newjob');




Route::get('adminpanel', function () {
    return view('adminpanel');
})->name('admin.index')->middleware('is_Admin');
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
//Type Route
Route::resource('types', TypeController::class);
//Location Route
Route::resource('locations', LocationController::class);
//Company Route
Route::resource('companies', CompanyController::class);
//job Route
Route::resource('jobs', JobController::class);
//Ajax Route
Route::post('/jobsearch',[AjaxController::class, 'search'])->name('jobsearch');

