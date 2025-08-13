<?php

class Database {
	private $dsn;
	private $username;
	private $password;

	public function __construct() {
		$this->dsn= "mysql:host=localhost;dbname=restoapp;port=3306;charset=utf8";
		$this->username= "root";
		$this->password= "";
	}

	public function chaineConnexion() {
		$pdo= new PDO($this->dsn, $this->username, $this->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
	

	public function request($sql, $params= null) {
		$pdo= $this->chaineConnexion();
		$req= $pdo->prepare($sql);

		if($params == null) {
			$req->execute();
		}
		else {
			$req->execute($params);
		}

		return $req;
	}


	public function recover($req, $one= true) {
		$datas= null;
		$req->setFetchMode(PDO::FETCH_OBJ);

		if($one == true) {
			$datas= $req->fetch();
		}
		else {
			$datas= $req->fetchAll();
		}

		return $datas;
	}
} 

?>