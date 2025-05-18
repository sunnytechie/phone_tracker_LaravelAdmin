<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpoController;

Route::post('/expo/register', [ExpoController::class, 'register']);
Route::post('/recieve/expo/audio', [ExpoController::class, 'storeaudio']);
Route::post('/recieve/expo/snapshot', [ExpoController::class, 'storesnapshot']);
Route::post('/recieve/expo/location', [ExpoController::class, 'storelocation']);
