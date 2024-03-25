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
Route::group(['namespace'=>'Api'], function(){
    Route::post('/login', 'UserController@login');
    Route::group(['middleware'=>'auth:sanctum'], function(){
        Route::any('/courseList', 'CourseController@courseList');
       Route::any('/courseDetail','CourseController@courseDetail');
       Route::any('/checkout','PayController@checkout');
       Route::any('/lessonList','LessonController@lessonList');
       Route::any('/lessonDetail','LessonController@lessonDetail');
       Route::any('/coursesBought','CourseController@coursesBought');
       Route::any('/orderList','CourseController@orderList');




    });
    // https://3148-2a01-9700-158e-b500-5c3d-cb5d-10bd-cfcf.ngrok-free.app/
    Route::any('/web_go_hooks','PayController@web_go_hooks');

});




