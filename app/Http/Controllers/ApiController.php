<?php

namespace App\Http\Controllers;

Use Response;

class ApiController extends Controller{

	protected $statusCode = 200;

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
		return $this->setStatusCode(404)->respondWithError($message);
	}

	/**
	 * Return 500 Message
	 *
	 * @return JSON
	 * @author Fred Carneiro
	 **/
	public function respondInternalError($message = 'Internal Error!')
	{
		return $this->setStatusCode(500)->respondWithError($message);
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
	 * undocumented function
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

}