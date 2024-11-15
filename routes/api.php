<?php

use App\Http\Controllers\DateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return 'Bienvenue sur la route toute la sainte journée';
});

Route::get('/unavailables', [DateController::class, 'list']);

Route::get('/unavailables/{id}', [DateController::class, 'show'])->where('id', '[0-9]+');

Route::post('/unavailables', [DateController::class, 'create']);

Route::put('/unavailables/{id}', [DateController::class, 'update'])->where('id', '[0-9]+');

Route::patch('/unavailables/{id}', [DateController::class, 'update'])->where('id', '[0-9]+');

Route::delete('/unavailables/{id}', [DateController::class, 'delete'])->where('id', '[0-9]+');
