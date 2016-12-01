<?php

namespace App\Http\Controllers;

Use Response;

class ApiController extends Controller{

    const HTTP_NOT_FOUND = 404;
	const HTTP_INTERNAL_ERROR = 500;
	const HTTP_CREATED = 201;
	const HTTP_UNPROCESSABLE_ENTITY = 422;
	const HTTP_OK = 200;
	
	protected $statusCode = self::HTTP_OK;


	/**
	 * getter for $statusCode
	 *
	 * @return mixed
	 * @author Fred Carneiro
	 **/
	public function getStatusCode()
	{
		return $this->statusCode;
	}


	/**
	 * setter for $statusCode
	 *
	 * @return $this
	 * @author Fred Carneiro
	 **/
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}

	/**
	 * Return 404 Message
	 *
	 * @return JSON
	 * @author Fred Carneiro
	 **/
	public function respondNotFound($message = 'Not found!')
	{
		return $this->setStatusCode(self::HTTP_NOT_FOUND)->respondWithError($message);
	}

	/**
	 * Return 500 Message
	 *
	 * @return JSON
	 * @author Fred Carneiro
	 **/
	public function respondInternalError($message = 'Internal Error!')
	{
		return $this->setStatusCode(self::HTTP_INTERNAL_ERROR)->respondWithError($message);
	}	

	/**
	 * Return the respond data
	 *
	 * @return JSON
	 * @author Fred Carneiro
	 **/
	public function respond($data, $headers = [])
	{
		return Response::json($data, $this->getStatusCode(), $headers);
	}

	/**
	 * Respond with error
	 *
	 * @return JSON
	 * @author Fred Carneiro
	 **/
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => $message,
			'status_code' => $this->getStatusCode()
		]);
	}

	/**
	 * Respond with 201 code
	 *
	 *
	 * @param $message
	 **/
	public function respondCreated($message = 'Created successfuly')
	{
		return $this->setStatusCode(self::HTTP_CREATED)
			->respond([
				'message' => $message
			]);
	}

	/**
	 * Respond with 422 code
	 *
	 *
	 * @param $message
	 **/
	public function respondUnprocessableEntity($message = 'Parameters Failed')
	{
		return $this->setStatusCode(self::HTTP_UNPROCESSABLE_ENTITY)
			->respond([
				'message' => $message
			]);
	}	

}