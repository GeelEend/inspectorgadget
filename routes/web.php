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

Route::get('/admin/teachers/create', ['App\Http\Controllers\AdminTeachersController', 'create'])->middleware(['auth', 'banned_at'])->name('admin.teachers.create');
Route::post('/admin/teachers/create', ['App\Http\Controllers\AdminTeachersController', 'store'])->middleware(['auth', 'banned_at']);
Route::get('/admin/teachers/edit/{teacher}', ['App\Http\controllers\AdminTeachersController', 'edit'])->middleware(['auth', 'banned_at'])->name('admin.teachers.edit');
Route::post('/admin/teachers/edit/{teacher}', ['App\Http\controllers\AdminTeachersController', 'update'])->middleware(['auth', 'banned_at']);
Route::get('/admin/teachers', ['App\Http\Controllers\AdminTeachersController', 'index'])->middleware(['auth', 'banned_at'])->name('admin.teachers.list');
Route::delete('/admin/teachers/destroy/{teacher}', ['App\Http\Controllers\AdminTeachersController', 'destroy'])->middleware('auth', 'banned_at')->name('admin.teachers.destroy');

Route::get('/admin/users', ['App\Http\Controllers\AdminUsersController', 'index'])->middleware(['auth'])->name('admin.users.list');

Route::post('/admin/users/edit/{user}', ['App\Http\controllers\AdminUsersController', 'update'])->middleware(['auth'])->name('user.update');

Auth::routes();
Route::group(['middleware'=>'banned_at'], function(){
    // Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('users', 'UserController@index')->name('users.index');
//     Route::get('userUserRevoke/{id}', array('as'=> 'users.revokeuser', 'uses' => 'UserController@revoke'));
//     Route::post('userBan', array('as'=> 'users.ban', 'uses' => 'UserController@ban'));
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'banned_at'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
});

