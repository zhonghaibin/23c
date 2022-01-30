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


Route::get('login', ['App\Http\Controllers\AuthController','login'])->name('login');
Route::post('logout', ['App\Http\Controllers\AuthController','logout'])->name('logout');
Route::post('authenticate', ['App\Http\Controllers\AuthController','authenticate'])->name('authenticate');
Route::get('/',  ['App\Http\Controllers\AppointmentController','appointment'])->name('appointment');

Route::get('inbox',  ['App\Http\Controllers\InboxController','inbox'])->name('inbox');
Route::get('inboxList',  ['App\Http\Controllers\InboxController','list'])->name('inboxList');

Route::get('administration',['App\Http\Controllers\AdministrationController','administration'])->name('administration');
Route::get('administrationList',['App\Http\Controllers\AdministrationController','administrationList'])->name('administrationList');

Route::get('getUserInfo',['App\Http\Controllers\AdministrationController','getUserInfo'])->name('getUserInfo');
Route::post('saveUserInfo',['App\Http\Controllers\AdministrationController','saveUserInfo'])->name('saveUserInfo');

Route::post('createInbox',  ['App\Http\Controllers\AdministrationController','createInbox'])->name('createInbox');
Route::post('createSales',  ['App\Http\Controllers\AdministrationController','createSales'])->name('createSales');
Route::post('changePassword',  ['App\Http\Controllers\AdministrationController','changePassword'])->name('changePassword');

Route::get('appointment',  ['App\Http\Controllers\AppointmentController','appointment'])->name('appointment');
Route::post('createAppointment',['App\Http\Controllers\AppointmentController','createAppointment'])->name('createAppointment');
Route::get('getAppointment',['App\Http\Controllers\AppointmentController','getAppointment'])->name('getAppointment');
Route::post('deleteAppointment', ['App\Http\Controllers\AppointmentController','deleteAppointment'])->name('deleteAppointment');

Route::get('agentListing',  ['App\Http\Controllers\AgentListingController','agentListing'])->name('agentListing');
Route::get('agentList',  ['App\Http\Controllers\AgentListingController','agentList'])->name('agentList');

Route::get('profileMaintenance', ['App\Http\Controllers\ProfileMaintenanceController','profileMaintenance'])->name('profileMaintenance');
Route::get('getProfileMaintenance', ['App\Http\Controllers\ProfileMaintenanceController','getProfileMaintenance'])->name('getProfileMaintenance');
Route::post('saveProfileMaintenance', ['App\Http\Controllers\ProfileMaintenanceController','saveProfileMaintenance'])->name('saveProfileMaintenance');

Route::get('registration', ['App\Http\Controllers\RegistrationController','registration'])->name('registration');
Route::get('registrationLinkUrl', ['App\Http\Controllers\RegistrationController','registrationLinkUrl'])->name('registrationLinkUrl');
Route::post('createRegistration', ['App\Http\Controllers\RegistrationController','createRegistration'])->name('createRegistration');
Route::get('getRegistration', ['App\Http\Controllers\RegistrationController','getRegistration'])->name('getRegistration');


Route::get('registrationLink',['App\Http\Controllers\RegistrationController','registrationLink'])->name('registrationLink');

Route::get('salesReport', ['App\Http\Controllers\SalesReportController','salesReport'])->name('salesReport');
Route::get('saleReportList', ['App\Http\Controllers\SalesReportController','saleReportList'])->name('saleReportList');

