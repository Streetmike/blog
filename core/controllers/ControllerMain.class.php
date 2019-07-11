<?php

namespace controllers;

use base\Controller;

class ControllerMain extends Controller{

	function actionIndex(){
		$posts = $this->_db->getAll('posts');

		foreach ($posts as $post){
			$string = rtrim(substr(strip_tags($post->content), 0, 200), "!,.-");
			$post->content = substr($string, 0, strrpos($string, ' '));
			$post->content .= '... ';
		}
		$this->_view->setTitle('Main page');
		$this->_view->render('content', $posts);
	}
}
