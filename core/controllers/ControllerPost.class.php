<?php

namespace controllers;

use base\Controller;

class ControllerPost extends Controller{
	public function actionGet(){
		$request = isset($this->_request->id) ? $this->_request : false;

		if(!$request){
			$this->_view->render('notFound', []);die;
		}

		$post = $this->_db->getById('posts', $request->id);

		$this->_view->setTitle($post->title);
		$this->_view->render('post', $post);
	}

	public function actionDelete(){
		header('ContentType: application/json');

		$request = isset($this->_request->id) ? $this->_request : false;

		if(!$request){
			$this->_view->render('notFound', []);die;
		}

		$response = $this->_db->delete('posts', $request->id);

		echo json_encode($response);
	}

	public function actionNewPost(){
		$this->_view->setTitle('New post form');
		$this->_view->render('newPost', []);
	}

	public function actionStore(){
		header('ContentType: application/json');

		if($this->_request->title == '' || $this->_request->author == '' ||
			$this->_request->content == ''){
				echo 'false';
				die;
		}
		$request = $this->_request;

		$uploaddir = 'images/';
		if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir );

		foreach( $_FILES as $file ){
        if( move_uploaded_file( $file['tmp_name'], $uploaddir . basename($file['name']) ) ){
            $files[] = $uploaddir . $file['name'];
        }else{
            $error = true;
        }
    }

		$data = "'".strip_tags($request->title)."', '".strip_tags($request->author)."', '". addslashes(strip_tags($request->content))."', '".$files[0]."', now()";

		$result = $this->_db->create('posts', $data);

		return json_encode($result);
	}

	public function actionEditPost(){
		$request = isset($this->_request->id) ? $this->_request : false;

		if(!$request){
			$this->_view->render('notFound', []);die;
		}

		$post = $this->_db->getById('posts', $request->id);
		$post->type = 'edit';
		$this->_view->setTitle('Edit post form');
		$this->_view->render('newPost', ['post'=>$post]);
	}

	public function actionUpdate()
	{
		header('ContentType: application/json');

		if($this->_request->title == '' || $this->_request->author == '' ||
			$this->_request->content == ''){
				echo 'false';
				die;
		}
		$request = $this->_request;
		$data = [];

		if($_FILES['image']['name'] != ''){
			$uploaddir = 'images/';
			if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir );

			foreach( $_FILES as $file ){
	        if( move_uploaded_file( $file['tmp_name'], $uploaddir . basename($file['name']) ) ){
	            $files[] = $uploaddir . $file['name'];
	        }else{
	            $error = true;
	        }
	    }
			$data['image'] = $files[0];
		}

		$data['title'] = addslashes(strip_tags($request->title));
		$data['author'] = addslashes(strip_tags($request->author));
		$data['content'] = addslashes(strip_tags($request->content));
		$data['id'] = $request->id;

		$result = $this->_db->update('posts', $data);

		return json_encode($result);
	}
}
