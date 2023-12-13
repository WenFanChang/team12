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

});****/
//顯示所有隊員資料
Route::get('members', [MembersController::class, 'index'])->name('members.index');
//顯示單一隊員資料
Route::get('members/{id}', [MembersController::class, 'show'])->where('id', '[0-9]+')->name('members.show');
//修改單一隊員資料
Route::get('members/{id}/edit', [MembersController::class, 'edit'])->where('id', '[0-9]+')->name('members.edit');
//刪除單一隊員資料
Route::delete('members/delete/{id}', [MembersController::class, 'destroy'])->where('id', '[0-9]+')->name('members.destroy');

Route::get('orchestras', [OrchestrasController::class, 'index'])->name('orchestras.index');

Route::get('orchestras/{id}', [OrchestrasController::class, 'show'])->where('id', '[0-9]+')->name('orchestras.show');

Route::get('orchestras/{id}/edit', [OrchestrasController::class, 'edit'])->where('id', '[0-9]+')->name('orchestras.edit');

Route::delete('orchestras/delete/{id}', [OrchestrasController::class, 'destroy'])->where('id', '[0-9]+')->name('orchestras.destroy');