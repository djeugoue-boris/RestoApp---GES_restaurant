<?php
require_once 'Database.php';

class MenuDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}

	public function create($idtypemenu, $intitule, $prix, $image) {
		$sql= "insert into menu set idtypemenu=?, intitule=?, prix=?, image=?";
		$params= array($idtypemenu, $intitule, $prix, $image);
		$this->db->request($sql, $params);
	}


	public function read($idmenu) {
		$sql= "select * from menu where idmenu=?";
		$params= array($idmenu);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}


	public function readIdtypemenu($idtypemenu) {
		$sql= "select * from menu where idtypemenu=?";
		$params= array($idtypemenu);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readIntitule($intitule) {
		$sql= "select * from menu where intitule=?";
		$params= array($intitule);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readPrix($prix) {
		$sql= "select * from menu where prix=?";
		$params= array($prix);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readAll() {
		$sql= "select * from menu order by idmenu desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	public function update($idmenu, $idtypemenu, $intitule, $prix, $image) {
		$sql= "update menu set idtypemenu=?, intitule=?, prix=?, image=? where idmenu=?";
		$params= array($idtypemenu, $intitule, $prix, $image, $idmenu);
		$this->db->request($sql, $params);
	}


	public function delete($idmenu) {
		$sql= "delete from menu where idmenu=?";
		$params= array($idmenu);
		$this->db->request($sql, $params);
	}
}


?>