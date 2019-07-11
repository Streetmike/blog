<?php


class Request{
	private $request = null;
	private $method = null;

	/**
	 * Request constructor.
	 * @param null $data
	 */
	public function __construct(){
		$this->request = $_REQUEST;
		$this->method = $_SERVER['REQUEST_METHOD'];

		return $this;
	}

	/**
	 * @return null
	 */
	public function getData(){
		return $this->data;
	}

	public function getURI(){
		return $_GET['url'];
	}
}
