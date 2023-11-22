<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\OrchestrasController;


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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function (){
    return redirect('members');

});
/***Route::get('/', function (){
    return redirect('orchestras');

});****///d1104181048測試
Route::get('members', [MembersController::class, 'index'])->name('members.index');
Route::get('orchestras', [OrchestrasController::class, 'index'])->name('orchestras.index');
