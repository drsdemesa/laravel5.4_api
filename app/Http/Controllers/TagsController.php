<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Lesson;
use App\Blog54\Transformers\TagTransformer;

class TagsController extends ApiController
{
	protected $tagTransformer;


	/*
	* @var Blog54\Transformers\LessonTransformer
	*/
	function __construct(TagTransformer $tagTransformer) {
		$this->tagTransformer = $tagTransformer;	
	}

    public function index($lessonId = null){

    	$tags = $this->getTags($lessonId);
    	return $this->respond([
    		'data' => $this->tagTransformer->transformCollection($tags->all())
    	]);
    	
    }

    public function show( $id ){
    	$tag = Tag::find($id);

    	if( !$tag){
    		return $this->respondNotFound("Tag does not exist..");
    	} else{
    		// return $tag;
    		return $this->respond([
    			'data' => $this->tagTransformer->transform($tag)
    		]);
    	}
    }

    private function getTags( $lessonId ){
        return $lessonId ? Lesson::find($lessonId)->tags : Tag::all(); //really bad practice, has to return only a number of resources at a time especially in a case of large table contents
    }
}
