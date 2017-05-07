<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
    	$lesson = Lesson::find($id);   //retrieve a model by its primary key

    	if( !$lesson){
    		return $this->respondNotFound("Lesson does not exist..");
    	} else{
    		return $this->respond([
    			'data' => $this->lessonTransformer->transform($lesson)
    		]);
    	}
    }

    public function store(){
    	if( !Input::get('title') or !Input::get('body') or !Input::has('is_displayed')) {
    		return $this->respondInvalidParams("Parameters failed validation for a lesson.");
    	}

    	Lesson::create(Input::all());
    	return $this->respondCreated("Successfully created new lesson.");

    }

}
