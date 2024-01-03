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

Route::get('members/senior', [MembersController::class, 'senior'])->name('members.senior');

Route::post('members/position', [MembersController::class, 'position'])->name('members.sposition');

Route::get('members/{id}', [MembersController::class, 'show'])->where('id','[0-9]+')->name('members.show');

Route::get('members/{id}/edit', [MembersController::class, 'edit'])->where('id','[0-9]+')->name('members.edit');

Route::patch('members/update/{id}', [MembersController::class, 'update'])->where('id', '[0-9]+')->name('members.update');

Route::delete('members/delete/{id}', [MembersController::class, 'destroy'])->where('id','[0-9]+')->name('members.destroy');

Route::get('members/create', [MembersController::class, 'create'])->name('members.create');

Route::post('members/store', [MembersController::class, 'store'])->name('members.store');


//顯示單筆

//修改表單

Route::get('orchestras', [OrchestrasController::class, 'index'])->name('orchestras.index');

Route::get('orchestras/{id}', [OrchestrasController::class, 'show'])->where('id','[0-9]+')->name('orchestras.show');

Route::get('orchestras/{id}/edit', [OrchestrasController::class, 'edit'])->where('id', '[0-9]+')->name('orchestras.edit');

Route::patch('orchestras/update/{id}', [OrchestrasController::class, 'update'])->where('id', '[0-9]+')->name('orchestras.update');

Route::delete('orchestras/delete/{id}', [OrchestrasController::class, 'destroy'])->where('id','[0-9]+')->name('orchestras.destroy');

Route::get('orchestras/create', [OrchestrasController::class, 'create'])->name('orchestras.create');

Route::post('orchestras/store', [OrchestrasController::class, 'store'])->name('orchestras.store');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

