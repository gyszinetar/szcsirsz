<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\WellcomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/','App\Http\Controllers\WellcomeController@index')->name('wellcome.index')->middleware('ifAuth');
Route::get('/login/login/{msg?}','App\Http\Controllers\LoginController@login')->name('login.login');
Route::post('/login/do','App\Http\Controllers\LoginController@dologin')->name('login.dologin');
Route::get('/login/logout','App\Http\Controllers\LoginController@logout')->name('login.logout');
Route::get('/admin/createuser','App\Http\Controllers\AdminController@createuser')->name('admin.createuser')->middleware('ifAdmin');
Route::post('/admin/createuserstore','App\Http\Controllers\AdminController@createuserstore')->name('admin.createuserstore')->middleware('ifAdmin');
Route::get('/admin/manageuser','App\Http\Controllers\AdminController@manageuser')->name('admin.manageuser')->middleware('ifAdmin');
Route::post('/admin/manageuserselect','App\Http\Controllers\AdminController@manageuserselect')->name('admin.manageuserselect')->middleware('ifAdmin');
Route::post('/admin/manageusergo','App\Http\Controllers\AdminController@manageusergo')->name('admin.manageusergo')->middleware('ifAdmin');
Route::get('/admin/programedit','App\Http\Controllers\AdminController@programedit')->name('admin.programedit')->middleware('ifAdmin');
Route::post('/admin/programupdate','App\Http\Controllers\AdminController@programupdate')->name('admin.programupdate')->middleware('ifAdmin');
Route::get('/login/changepassword','App\Http\Controllers\LoginController@changepassword')->name('login.changepassword')->middleware('ifAuth');
Route::post('/login/dochangepassword','App\Http\Controllers\LoginController@dochangepassword')->name('login.dochangepassword')->middleware('ifAuth');

Route::get('/irsz/index','App\Http\Controllers\IrszController@index')->name('irsz.index')->middleware('ifAuth');
Route::get('/irsz/export','App\Http\Controllers\IrszController@export')->name('irsz.export')->middleware('ifAuth');
Route::post('/irsz/upload','App\Http\Controllers\IrszController@upload')->name('irsz.upload')->middleware('ifAuth');
