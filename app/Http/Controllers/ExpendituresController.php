<?php

namespace App\Http\Controllers;
use App\Expenditure;
use Illuminate\Support\Facades\Input;


use Illuminate\Http\Request;

class ExpendituresController extends Controller
{
	public function store(){
		Expenditure::create(Input::all());
		// return $this->respondCreated("Successfully created new invoice.");
		return view('welcome');

	}
}
