<?php

use App\Http\Controllers\Api\VisitController;
use Illuminate\Support\Facades\Route;

Route::middleware('patient.auth')->group(function (){
    Route::get('/visits', [VisitController::class,'index']);
});
