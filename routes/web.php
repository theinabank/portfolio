<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AdminController;
use App\Mail\MyTestMail as Mail;

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


// Admin
Route::get('/admin/main', [AdminController::class, 'index'])->name('admin-main')->middleware(['role:admin']);
//create
Route::get('/admin/main/add', [AdminController::class, 'create'])->name('admin-add')->middleware(['role:admin']);
Route::post('/admin/main/add', [AdminController::class, 'store'])->name('admin-store')->middleware(['role:admin']);
//read
Route::get('/admin/main/show/{id}', [AdminController::class, 'show'])->name('admin-show')->middleware(['role:admin']);
//update
Route::get('/admin/main/edit/{id}', [AdminController::class, 'edit'])->name('admin-edit')->middleware(['role:admin']);
Route::post('/admin/main/update/{id}', [AdminController::class, 'update'])->name('admin-update')->middleware(['role:admin']);
//delete
Route::delete('/admin/main/delete/{id}', [AdminController::class, 'destroy'])->name('admin-delete')->middleware(['role:admin']);

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware(['role:admin']);

require __DIR__.'/auth.php';

// Welcome
Route::get('/', [ProjectsController::class, 'welcome'])->name('main-index');

// Projects
Route::get('/projects', [ProjectsController::class, 'projectIndex'])->name('project-index');
Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('project-show');
Route::get('/projects/category/{id}', [ProjectsController::class, 'category'])->name('project-category');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact-index');

// About
Route::get('/about', function () {
    return view('about');
})->name('about-index');
