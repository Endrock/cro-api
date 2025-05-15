<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('roles', App\Http\Controllers\API\RoleAPIController::class)
    ->except(['create', 'edit']);

Route::resource('teams', App\Http\Controllers\API\TeamAPIController::class)
    ->except(['create', 'edit']);

Route::resource('pods', App\Http\Controllers\API\PodAPIController::class)
    ->except(['create', 'edit']);

Route::resource('clients', App\Http\Controllers\API\ClientAPIController::class)
    ->except(['create', 'edit']);

Route::resource('sites', App\Http\Controllers\API\SiteAPIController::class)
    ->except(['create', 'edit']);

Route::resource('profiles', App\Http\Controllers\API\ProfileAPIController::class)
    ->except(['create', 'edit']);

Route::resource('skills', App\Http\Controllers\API\SkillAPIController::class)
    ->except(['create', 'edit']);

Route::resource('client-statuses', App\Http\Controllers\API\ClientStatusAPIController::class)
    ->except(['create', 'edit']);

Route::resource('client-weights', App\Http\Controllers\API\ClientWeightAPIController::class)
    ->except(['create', 'edit']);