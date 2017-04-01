<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use Response;

class LessonsController extends Controller
{
    public function index(){
    	$lessons = Lesson::all();	//really bad practice	
    	return Response::json([
    		'data' => $lessons->toArray()
    	], 200);
    }

    public function show( $id ){
    	$lesson = Lesson::find($id);

    	if( !$lesson){
    		return Response::json([
    			'error' => [
    				'message' => 'Lesson does not exist',
    				'code' => '215'
    			]
    		], '404');
    	} else{
    		return Response::json([
    			'data' => $lesson->toArray()
    		],200);
    	}
    }
}
