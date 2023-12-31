<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\OrchestrasController;
use Illuminate\Support\Facades\Auth;

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
//D1104181027組員分支測試
//Route::get('/', function () {
//    return view('welcome');
//});
Route::middleware(['auth'])->group(function () {
    Route::get('/', function (){
        return redirect('members');

    });
    /***Route::get('/', function (){
        return redirect('orchestras');

    });****/
    // 顯示顯示所有團員資料
    Route::get('members', [MembersController::class, 'index'])->name('members.index');
    // 顯示顯示資深團員資料
    Route::get('members/senior', [MembersController::class, 'senior'])->name('members.senior');
    // 選定位置查詢團員
    Route::get('members/position', [MembersController::class, 'position'])->name('members.position');
    // 顯示單一團員資料
    Route::get('members/{id}', [MembersController::class, 'show'])->where('id', '[0-9]+')->name('members.show');
    // 修改單一團員表單
    Route::get('members/{id}/edit', [MembersController::class, 'edit'])->where('id', '[0-9]+')->name('members.edit');
    // 刪除單一球員資料
    Route::delete('members/delete/{id}', [MembersController::class, 'destroy'])->where('id', '[0-9]+')->name('members.destroy')->middleware('can:admin');
    // 新增團員表單
    Route::get('members/create', [MembersController::class, 'create'])->name('members.create')->middleware('can:admin');
    // 修改團員表單
    Route::get('members/{id}/edit', [MembersController::class, 'edit'])->where('id', '[0-9]+')->name('members.edit');
    // 修改團員資料
    Route::patch('members/update/{id}', [MembersController::class, 'update'])->where('id', '[0-9]+')->name('members.update');
    //
    Route::post('members/store', [MembersController::class, 'store'])->where('id', '[0-9]+')->name('members.store')->middleware('can:admin');




    Route::get('orchestras', [OrchestrasController::class, 'index'])->name('orchestras.index');

    Route::get('orchestras/{id}', [OrchestrasController::class, 'show'])->where('id', '[0-9]+')->name('orchestras.show');

    Route::get('orchestras/{id}/edit', [OrchestrasController::class, 'edit'])->where('id', '[0-9]+')->name('orchestras.edit');

    Route::delete('orchestras/delete/{id}', [OrchestrasController::class, 'destroy'])->where('id', '[0-9]+')->name('orchestras.destroy')->middleware('can:admin');

    Route::get('orchestras/create', [OrchestrasController::class, 'create'])->name('orchestras.create')->middleware('can:admin');
    //修改樂團表單
    Route::get('orchestras/{id}/edit', [OrchestrasController::class, 'edit'])->where('id', '[0-9]+')->name('orchestras.edit');
    //修改樂團資料
    Route::patch('orchestras/update/{id}', [OrchestrasController::class, 'update'])->where('id', '[0-9]+')->name('orchestras.update');
    //儲存新樂團資料
    Route::post('orchestras/store', [OrchestrasController::class, 'store'])->name('orchestras.store')->middleware('can:admin');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

