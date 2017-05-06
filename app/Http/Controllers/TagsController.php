<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends ApiController
{
    public function index(){

    	return Tag::all();	//really bad practice	
    	
    }

    public function show( $id ){
    	$tag = Tag::find($id);

    	if( !$tag){
    		return $this->respondNotFound("Tag does not exist..");
    	} else{
    		return $tag;
    	}
    }
}
