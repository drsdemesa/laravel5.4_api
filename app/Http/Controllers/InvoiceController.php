<?php

namespace App\Http\Controllers;
use App\Invoice;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(){
    	//check if complete info

    	Invoice::create(Input::all());
    	return $this->respondCreated("Successfully created new invoice.");

    }
}
