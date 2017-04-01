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
    	], 404);
    }
}
