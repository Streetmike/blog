<?php


namespace base;


class View
{
	public $basePath = __DIR__ . '/../views/templates/';
	public $stylePath = '/../../styles/';
	
	protected $title;
	protected $css = [];
	protected $js = [];
	
	public $data;
	
	protected $_layout;
	
	public function setLayout($layout)
	{
		$this->_layout = __DIR__ . '/../views/layout/' . $layout . '.php';
	}
	
	public function render($tplName, $data)
	{
		include $this->_layout;
	}
	
	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @param mixed $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function setCss($css)
	{
		$this->css[] = $css;
	}
	
	public function getCss()
	{
		return $this->css;
	}
	
	public function setJs($js)
	{
		$this->js[] = $js;
	}
}