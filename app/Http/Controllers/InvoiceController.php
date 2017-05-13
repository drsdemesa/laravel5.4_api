<?php

namespace App\Http\Controllers;
use App\Invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{
	public function index(){
		//do nothing
	}
    public function store(){
    	//check if complete info
    	// print_r(Input::all());
    	Invoice::create(Input::all());
    	// return $this->respondCreated("Successfully created new invoice.");
    	return view('report');

    }
}
