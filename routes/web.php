<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'doLogin'])->name('admin.doLogin');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

Route::resource('admin/category', CategoryController::class);
Route::get('admin/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

Route::resource('admin/post', PostController::class);
Route::get('admin/post/{id}/delete', [CategoryController::class, 'destroy'])->name('post.delete');

Route::get('admin/setting', [SettingController::class, 'index'])->name('admin.setting');
Route::post('admin/setting', [SettingController::class, 'save'])->name('admin.setting.save');
