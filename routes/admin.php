<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\LoginController;
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
define('PAGINATION_COUNT',10);
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    ######################### Begin Languages Route ########################
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/',[LanguagesController::class, 'index']) -> name('admin.languages');
        Route::get('create',[LanguagesController::class, 'create']) -> name('admin.languages.create');
        Route::post('store',[LanguagesController::class, 'store']) -> name('admin.languages.store');

        Route::get('edit/{id}',[LanguagesController::class, 'edit']) -> name('admin.languages.edit');
        Route::post('update/{id}',[LanguagesController::class, 'update']) -> name('admin.languages.update');

        Route::get('delete/{id}',[LanguagesController::class, 'destroy']) -> name('admin.languages.delete');


    });
    ######################### End Languages Route ########################
});



Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});
