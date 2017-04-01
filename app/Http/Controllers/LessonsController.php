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
    		'data' => $this->transformCollection($lessons)
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
    			'data' => $this->transform($lesson)
    		],200);
    	}
    }

    private function transform($lesson){
    	// print_r($lesson);

		return [
			'title' => $lesson['title'],
			'body' => $lesson['body'],
			'some_bool' => $lesson['is_displayed']
		];

    }

    public function transformCollection ($lessons) {
    	return array_map([$this, 'transform'], $lessons->toArray());
    }
}
