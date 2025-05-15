<?php

use App\Http\Controllers\PodMemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    /* Base CRUDS */
    Route::resource('teams', App\Http\Controllers\TeamController::class);
    Route::resource('pods', App\Http\Controllers\PodController::class);
    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::resource('sites', App\Http\Controllers\SiteController::class);
    Route::resource('profiles', App\Http\Controllers\ProfileController::class);
    Route::resource('skills', App\Http\Controllers\SkillController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    
    
    /* Extension CRUD Routes */
    Route::get('pod/members/', [PodMemberController::class, 'index'])->name('pods.members.index');
    Route::get('pod/members/{pod}', [PodMemberController::class, 'edit'])->name('pods.members.edit');
    Route::post('pod/members/{pod}', [PodMemberController::class, 'update'])->name('pods.members.update');
    
    Route::resource('client-statuses', App\Http\Controllers\ClientStatusController::class);
    Route::resource('client-weights', App\Http\Controllers\ClientWeightController::class);
});


