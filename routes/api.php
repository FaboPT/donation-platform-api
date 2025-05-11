<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('campaigns')->group(function() {
        Route::get('', [CampaignController::class, 'index'])->name('campaign.index');
        Route::post('', [CampaignController::class, 'store'])->name('campaign.store');
        Route::put('/{id}', [CampaignController::class, 'update'])->name('campaign.update');
        Route::delete('/{id}', [CampaignController::class, 'destroy'])->name('campaign.destroy');
    });

});
