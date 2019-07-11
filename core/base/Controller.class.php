<?php

namespace base;

use library\DB;

abstract class Controller
{
	protected $_view;
	protected $_db;
	protected $_request;

	public function __construct($request){
		$this->_request = (object)$request;
		$this->_db = DB::getInstance();
		$this->_view = new View();
		$this->_view->setLayout('main');
	}
}
