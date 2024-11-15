<?php

use App\Http\Controllers\TruthController;
use App\Http\Controllers\DareController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("truth")->group(function () {
    Route::controller(TruthController::class)->group(function () {
        Route::get("/", "index");
        Route::put("/{truth}", "update");
    });
});

Route::prefix("dare")->group(function () {
    Route::controller(DareController::class)->group(function () {
        Route::get("/", "index");
        Route::put("/{dare}","update");
    });
});