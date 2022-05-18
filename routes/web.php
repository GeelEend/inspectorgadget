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
    return view('welcome');
});

Route::get('/admin/teachers/create', ['App\Http\Controllers\AdminTeachersController', 'create'])->middleware(['auth'])->name('admin.teachers.create');
Route::post('/admin/teachers/create', ['App\Http\Controllers\AdminTeachersController', 'store'])->middleware(['auth']);
Route::get('/admin/teachers/edit/{teacher}', ['App\Http\controllers\AdminTeachersController', 'edit'])->middleware(['auth'])->name('admin.teachers.edit');
Route::post('/admin/teachers/edit/{teacher}', ['App\Http\controllers\AdminTeachersController', 'update'])->middleware(['auth']);
Route::get('/admin/teachers', ['App\Http\Controllers\AdminTeachersController', 'index'])->middleware(['auth'])->name('admin.teachers.list');
Route::delete('/admin/teachers/destroy/{teacher}', ['App\Http\Controllers\AdminTeachersController', 'destroy'])->middleware('auth')->name('admin.teachers.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
