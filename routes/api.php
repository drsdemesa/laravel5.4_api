<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(["prefix" => "v1", 'middleware' => ['auth.basic'],"on" => "post"], function() {
Route::group(["prefix" => "v1"], function() {
	Route::resource('lessons', 'LessonsController');
	Route::resource('tags', 'TagsController', ["only" => ['index', 'show']]);
	//Route::resource('lessons.tags', 'LessonTagsController'); // one option to show api/v1/lessons/2/tags but it is too much for now
	// Route::get('lessons/{id}/tags', 'LessonsController@tags'); //another option
	Route::get('lessons/{id}/tags', 'TagsController@index'); //another option

});