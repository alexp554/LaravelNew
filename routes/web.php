<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Staff\ManagementStaffController;
use App\Http\Controllers\MemberListController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StatisticController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [StatisticController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login Multi User
Route::get('/admin', [SuperAdminController::class, 'index'])->name('super_admin')->middleware('super_admin');
Route::get('/staff', [ManagementStaffController::class, 'index'])->name('management_staff')->middleware('management_staff');
Route::get('/member', [MemberController::class, 'index'])->name('member')->middleware('member');

// Member List
Route::any('/memberList/data', [MemberListController::class, 'data']);

Route::prefix('admin')->group(function () {
    Route::get('memberList',[MemberListController::class, 'index'])->name('memberList.index')->middleware('super_admin');

    //notification
    Route::get('/notifications', [SuperAdminController::class, 'indexNotif'])->name('notif');
    Route::post('/mark-as-read', [SuperAdminController::class, 'markNotification'])->name('markNotification')->middleware('super_admin');

    //event
    Route::get('event',[EventController::class, 'index'])->middleware('super_admin');
});
Route::prefix('staff')->group(function () {
    Route::get('memberList',[MemberListController::class, 'index'])->name('memberList.index')->middleware('management_staff');

    //event
    Route::get('event',[EventController::class, 'index'])->middleware('management_staff');
});

// Ajax member list
Route::post('memberList/updateWifi',[MemberListController::class, 'updateWifi']);
Route::post('/memberList/update_status', [MemberListController::class, 'update_status']);
Route::post('/memberList/update_checked', [MemberListController::class, 'update_checked']);
Route::delete('/memberList/destroy', [MemberListController::class, 'destroy']);
Route::post('/memberList/export', [MemberListController::class, 'exportData']);

// Ajax event list
Route::any('/event/dataEvent', [EventController::class, 'dataEvent']);
Route::post('/event/add',[EventController::class, 'store'])->middleware('super_admin');
Route::post('/event/show',[EventController::class, 'show'])->middleware('super_admin');
Route::patch('/event/update',[EventController::class, 'update'])->middleware('super_admin');
Route::delete('/event/destroy',[EventController::class, 'destroy'])->middleware('super_admin');
Route::post('/event/export',[EventController::class, 'exportEvent'])->middleware('super_admin');
Route::get('/event/audience/{id}',[EventController::class, 'exportAudience'])->middleware('super_admin')->name('audience.export');

Route::group(['prefix' => 'member', 'middleware' => 'member'], function () {
    Route::get('/myprofile',[MemberController::class, 'memberProfile'])->name('member.myprofile');
    Route::get('myprofile/edit',[MemberController::class, 'memberEdit'])->name('member.myprofile.edit');
    Route::patch('myprofile/edit/{user}', [MemberController::class, 'updateProfile']);
    Route::get('/mywifi',[MemberController::class, 'memberWifi']);
});