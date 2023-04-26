<?php

use Core\RouterService as Route;
use App\Controllers\SliderController;

Route::get('admin/slider',[SliderController::class,'index']);
Route::post('admin/slider',[SliderController::class,'store']);


Route::get('admin/blog',[\app\controllers\BlogController::class,'index']);
Route::get('admin/blog/create',[\app\controllers\BlogController::class,'create']);
Route::get('admin/blog/{id}', [\app\controllers\BlogController::class, 'edit']);
Route::get('admin/contact', [\app\controllers\ContactController::class, 'listContact']);


Route::post('admin/blog', [\app\controllers\BlogController::class, 'store']);
Route::post('admin/blog/{id}', [\app\controllers\BlogController::class, 'update']);
Route::post('admin/blog-delete/{id}', [\app\controllers\BlogController::class, 'delete']);
