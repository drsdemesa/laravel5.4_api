<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Blog54\Transformers\LessonTransformer;

class LessonsController extends ApiController
{
	/*
	* @var Blog54\Transformers\LessonTransformer
	*/

	protected $lessonTransformer;

	function __construct(LessonTransformer $lessonTransformer) {
		$this->lessonTransformer = $lessonTransformer;

		// $this->beforeFilter('auth.basic');
	}

    public function index(){
    	// if(!DB::connection()->getDatabaseName()){
	    	//return $this->respondInternalError("Something is wrong with database connection");
	   	// }

    	$lessons = Lesson::all();	//really bad practice	
    	return $this->respond([
    		'data' => $this->lessonTransformer->transformCollection($lessons->all())
    	]);
    }

    public function show( $id ){
    	$lesson = Lesson::find($id);

    	if( !$lesson){
    		return $this->respondNotFound("Lesson does not exist..");
    	} else{
    		return $this->respond([
    			'data' => $this->lessonTransformer->transform($lesson)
    		]);
    	}
    }

    public function store(){
    	dd('store');
    }

}
