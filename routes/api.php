<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\Cabinet\CabinetCreditController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


# Auth
Route::prefix('auth')->controller(AuthController::class)->group(function() {

    Route::post('login', 'login');
    Route::get('user', 'user');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


# Cabinet
Route::group(['prefix' => 'cabinet'], function() {

    # My Credits
    Route::apiResource('credit', CabinetCreditController::class)->middleware('auth:api');

});

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact alexandr.statut@gmail.com'
    ], 404);
});

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
