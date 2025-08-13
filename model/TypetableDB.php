<?php
require_once 'Database.php';

class TypetableDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}

	public function create($intitule) {
		$sql= "insert into typetable set intitule=?";
		$params= array($intitule);
		$this->db->request($sql, $params);
	}


	public function read($idtypetable) {
		$sql= "select * from typetable where idtypetable=?";
		$params= array($idtypetable);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readIntitule($intitule) {
		$sql= "select * from typetable where intitule=?";
		$params= array($intitule);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}
	

	public function readAll() {
		$sql= "select * from typetable order by idtypetable desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	public function update($idtypetable ,$intitule) {
		$sql= "update typetable set intitule=? where idtypetable=?";
		$params= array($intitule, $idtypetable);
		$this->db->request($sql, $params);
	}

	public function delete($idtypetable) {
		$sql= "delete from typetable where idtypetable=?";
		$params= array($idtypetable);
		$this->db->request($sql, $params);
	}
}


?>