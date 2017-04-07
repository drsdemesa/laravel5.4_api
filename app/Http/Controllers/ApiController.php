<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Response as IllimunateResponse;
use Response;

class ApiController extends Controller {
	/*
	* @var int
	*/
	protected $statusCode = 200;
	// const HTTP_NOT_FOUND = 404;
	// const HTTP_INTERNAL_ERR = 500;
	const HTTP_UNPROCESSABLE_ENT = 422;
	// const HTTP_SUCCESS_PROCESS = 201;

	public function getStatusCode(){
		return $this->statusCode;
	}

	/*
	* @param mixed statusCode
	* @return this
	*/

	public function setStatusCode($statusCode){
		$this->statusCode = $statusCode;

		return $this;
	}

	public function respondNotFound($message = "Not found!"){
		// return $this->setStatusCode(self::HTTP_NOT_FOUND)->respondWithError($message);
		return $this->setStatusCode(IllimunateResponse::HTTP_NOT_FOUND)->respondWithError($message);	
	}

	public function respond($data, $headers = []){
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondInternalError($message = "Internal error."){
		return $this->setStatusCode(IllimunateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
	}

	public function respondInvalidParams($message = "Invalid params."){
		return $this->setStatusCode(self::HTTP_UNPROCESSABLE_ENT)->respondWithError($message);
	}

	public function respondCreated($message = "Successfully created."){
		return $this->setStatusCode(IllimunateResponse::HTTP_CREATED)->respond([
    			"message" => $message,
    			"status" => "success"
    		]);
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