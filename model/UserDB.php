<?php
require_once 'Database.php';

class UserDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}

	public function create($nom, $prenom, $telephone, $email, $password, $role) {
		$sql= "insert into user set nom=?, prenom=?, telephone=?, email=?, password=?, role=?";
		$params= array($nom, $prenom, $telephone, $email, $password, $role);
		$this->db->request($sql, $params);
	}


	public function read($iduser) {
		$sql= "select * from user where iduser=?";
		$params= array($iduser);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readNom($nom) {
		$sql= "select * from user where nom=?";
		$params= array($nom);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readPrenom($prenom) {
		$sql= "select * from user where prenom=?";
		$params= array($prenom);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readTelephone($telephone) {
		$sql= "select * from user where telephone=?";
		$params= array($telephone);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readEmail($email) {
		$sql= "select * from user where email=?";
		$params= array($email);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readPassword($password) {
		$sql= "select * from user where password=?";
		$params= array($password);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}


	public function readRole($role) {
		$sql= "select * from user where role=?";
		$params= array($role);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readAll() {
		$sql= "select * from user order by iduser desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readCompte($email, $password) {
		$sql= "select * from user where email=? and password=?";
		$params= array($email, $password);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}
   
	

	public function update($iduser, $nom, $prenom, $telephone, $email, $password, $role) {
		$sql= "update user set nom=?, prenom=?, telephone=?, email=?, password=?, role=? where iduser=?";
		$params= array($nom, $prenom, $telephone, $email, $password, $role, $iduser);
		$this->db->request($sql, $params);
	}


	public function delete($iduser) {
		$sql= "delete from user where iduser=?";
		$params= array($iduser);
		$this->db->request($sql, $params);
	}
}


?>