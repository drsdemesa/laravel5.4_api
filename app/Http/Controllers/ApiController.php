<?php 

namespace App\Http\Controllers;
use Response;

class ApiController extends Controller {
	/*
	* @var int
	*/
	protected $statusCode = 200;

	public function getStatusCode(){
		return $this->statusCode;
	}

	public function setStatusCode($statusCode){
		$this->statusCode = $statusCode;

		return $this;
	}

	public function respondNotFound($message = "Not found!"){
		return $this->setStatusCode(404)->respondWithError($message);
		
	}

	public function respond($data, $headers = []){
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondWithError($message){
		return $this->respond([
    			'error' => [
    				'message' => $message,
    				// 'code' => '215',
    				'status_code' => $this->getStatusCode()
    			]
    		]);
	}
}
?>