<?php

namespace library;

use PDO;

class DB{
	private $_db;
	static private $_instance;

	private function __construct($host, $username, $password, $database){
		$this->_db = new \PDO("mysql:host={$host};dbname={$database}", $username, $password);
		$this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$this->_db->query("SET NAMES 'utf8'");
	}

	public function getDB(){
		return $this->_db;
	}

	public static function getInstance(){
		if (!(self::$_instance instanceof self))
		{
			if(!file_exists(__DIR__.'/../config/db.conf.php')){
				throw new \Exception('Config file not found!');
			}

			$config = require_once __DIR__.'/../config/db.conf.php';
			self::$_instance = new self($config["host"], $config["dbuser"], $config["pass"], $config["dbname"]);
		}

		return self::$_instance;
	}

	public function getAll($table){
		$statement = $this->_db->prepare('SELECT * FROM '.$table);
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_OBJ);
	}

	public function getById($table, $id){
		$statement = $this->_db->prepare('SELECT * FROM '.$table.' WHERE id = :id');
		$statement->bindParam(":id", $id);
		$statement->execute();
		return $statement->fetch(\PDO::FETCH_OBJ);
	}

	public function delete($table, $id){
		$statement = $this->_db->prepare('DELETE FROM '.$table.' WHERE id = :id');
		$statement->bindParam(":id", $id);
		$statement->execute();

		return (bool)$statement->rowCount();
	}

	public function create($table, $data){
		$statement = $this->_db->prepare('INSERT INTO '.$table.' (title, author, content, image, date) VALUES('.$data.')');

		return $statement->execute();
	}

	public function update($table, $data){
		$image = isset($data['image']) ? "image='".$data['image']."', " : "";
		$statement = $this->_db->prepare("UPDATE ".$table." SET title='".$data['title']."', author='".$data['author']."', content = '".$data['content']."', " . $image . " date = now() WHERE id = '" . $data['id']."'");

		return $statement->execute();
	}
}
