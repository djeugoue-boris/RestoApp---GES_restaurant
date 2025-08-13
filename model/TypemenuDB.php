<?php
require_once 'Database.php';

class TypemenuDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}

	public function create($intitule) {
		$sql= "insert into typemenu set intitule=? ";
		$params= array( $intitule,);
		$this->db->request($sql, $params);
	}


	public function read($idtypemenu) {
		$sql= "select * from typemenu where idtypemenu=?";
		$params= array($idtypemenu);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readIntitule($intitule) {
		$sql= "select * from typemenu where intitule=?";
		$params= array($intitule);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}
	

	public function readAll() {
		$sql= "select * from typemenu order by idtypemenu desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function update($idtypemenu, $intitule) {
		$sql= "update typemenu set intitule=? where idtypemenu=?";
		$params= array($intitule, $idtypemenu);
		$this->db->request($sql, $params);
	}


	public function delete($idtypemenu) {
		$sql= "delete from typemenu where idtypemenu=?";
		$params= array($idtypemenu);
		$this->db->request($sql, $params);
	}
}


?>