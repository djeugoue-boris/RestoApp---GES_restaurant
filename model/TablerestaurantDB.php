<?php
require_once 'Database.php';

class TablerestaurantDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}

	public function create($idtypetable, $code, $nbplaces, $prix, $image) {
		$sql= "insert into tablerestaurant set idtypetable=?, code=?, nbplaces=?, prix=?, image=?";
		$params= array($idtypetable, $code, $nbplaces, $prix, $image);
		$this->db->request($sql, $params);
	}


	public function read($idtablerestaurant) {
		$sql= "select * from tablerestaurant where idtablerestaurant=?";
		$params= array($idtablerestaurant);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}


	public function readIdtypetable($idtypetable) {
		$sql= "select * from tablerestaurant where idtypetable=?";
		$params= array($idtypetable);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readCode($code) {
		$sql= "select * from tablerestaurant where code=?";
		$params= array($code);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

	public function readPrix($prix) {
		$sql= "select * from tablerestaurant where prix=?";
		$params= array($prix);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}


	public function readAll() {
		$sql= "select * from tablerestaurant order by idtablerestaurant desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	public function update($idtablerestaurant, $idtypetable, $code, $nbplaces, $prix, $image) {
		$sql= "update tablerestaurant set idtypetable=?, code=?, nbplaces=?, prix=?, image=? where idtablerestaurant= ?";
		$params= array($idtypetable, $code, $nbplaces, $prix, $image, $idtablerestaurant);
		$this->db->request($sql, $params);
	}

	public function delete($idtablerestaurant) {
		$sql= "delete from tablerestaurant where idtablerestaurant=?";
		$params= array($idtablerestaurant);
		$this->db->request($sql, $params);
	}
}


?>