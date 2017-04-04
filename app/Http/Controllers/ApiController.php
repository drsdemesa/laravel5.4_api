<?php 

namespace App\Http\Controllers;
use Response;

class ApiController extends Controller {
	protected $statusCode;

	public function getStatusCode(){
		return $this->statusCode;
	}

	public function setStatusCode($statusCode){
		$this->statusCode = $statusCode;
	}

	public function respondNotFound($message = "Not found!"){
		return Response::json([
    			'error' => [
    				'message' => 'Lesson does not exist',
    				'code' => '215'
    			]
    		], '404');
	}
}
?>