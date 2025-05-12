<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class]);

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('campaigns')->group(function() {
        Route::get('', [CampaignController::class, 'index'])->name('campaign.index');
        Route::post('', [CampaignController::class, 'store'])->name('campaign.store');
        Route::put('/{campaign}', [CampaignController::class, 'update'])->name('campaign.update');
        Route::delete('/{campaign}', [CampaignController::class, 'destroy'])->name('campaign.destroy');
    });

});
