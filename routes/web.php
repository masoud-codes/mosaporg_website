<?php

use App\Http\Controllers\Approaches\ApproachController;
use App\Http\Controllers\Beneficiaries\BeneficiaryController;
use App\Http\Controllers\Organisation\ProfileController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

    Route::get('/organisation/profile', [ProfileController::class, 'index'])
    ->name('profile.index');

    Route::get('/profile/creation', [ProfileController::class, 'createProfile'])
    ->name('profile.create');

    Route::get('/approaches', [ApproachController::class, 'index'])
    ->name('org.approaches');

    Route::get('/approaches/create', [ApproachController::class, 'create'])
    ->name('org.approaches.create');

    Route::get('/beneficiaries', [BeneficiaryController::class, 'index'])
    ->name('beneficiary.index');

    Route::get('/beneficiaries/create', [BeneficiaryController::class, 'create'])
    ->name('beneficiary.create');
});
