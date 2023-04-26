<?php


use Core\RouterService as Route;
use Core\FileService;




Route::get('/', [\app\controllers\HomeController::class,'index']);
Route::get('/blog/{slug}', [\app\controllers\HomeController::class,'blogDetail']);
Route::get('/contact', [\app\controllers\ContactController::class,'index']);
Route::get('/admin', [\app\controllers\ContactController::class,'admin']);


Route::post('/contact', [\app\controllers\ContactController::class,'contact']);
