<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use Response;
use App\Blog54\Transformers\LessonTransformer;

class LessonsController extends Controller
{
	/*
	* @var Blog54\Transformers\LessonTransformer
	*/

	protected $lessonTransformer;

	function __construct(LessonTransformer $lessonTransformer) {
		$this->lessonTransformer = $lessonTransformer;
	}
    public function index(){
    	$lessons = Lesson::all();	//really bad practice	
    	return Response::json([
    		'data' => $this->lessonTransformer->transformCollection($lessons->all())
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
    			'data' => $this->lessonTransformer->transform($lesson)
    		],200);
    	}
    }


}
