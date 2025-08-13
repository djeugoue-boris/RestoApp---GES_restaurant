<?php
require_once 'Database.php';

class ReserverDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}



	public function create($iduser, $idtablerestaurant, $nbheures, $consignes, $modepaiement, $etat, $dateenregistrement, $datereservation) {
		$sql= "insert into reserver set iduser=?, idtablerestaurant=?, nbheures=?, consignes=?, modepaiement=?, etat=?, dateenregistrement=?, datereservation=?";
		$params= array($iduser, $idtablerestaurant, $nbheures, $consignes, $modepaiement, $etat, $dateenregistrement, $datereservation);
		$this->db->request($sql, $params);
	}


	public function read($idreserver) {
		$sql= "select * from reserver where idreserver=?";
		$params= array($idreserver);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}

    public function readIduser($iduser) {
		$sql= "select * from reserver where iduser=?";
		$params= array($iduser);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	} 


	public function readIdtablerestaurant($idtablerestaurant) {
		$sql= "select * from reserver where idtablerestaurant=?";
		$params= array($idtablerestaurant);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	} 


	public function readModepaiement($modepaiement) {
		$sql= "select * from reserver where modepaiement=?";
		$params= array($modepaiement);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	public function readEtat($etat) {
		$sql= "select * from reserver where etat=?";
		$params= array($etat);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	public function readDateenregistrement($dateenregistrement) {
		$sql= "select * from reserver where dateenregistrement=?";
		$params= array($dateenregistrement);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	public function readDatereservation($datereservation) {
		$sql= "select * from reserver where datereservation=?";
		$params= array($datereservation);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readAll() {
		$sql= "select * from reserver order by idreserver desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function update($idreserver, $iduser, $idtablerestaurant, $nbheures, $consignes, $modepaiement, $etat, $dateenregistrement, $datereservation) {
		$sql= "update reserver set iduser=?, idtablerestaurant=?, nbheures=?, consignes=?, modepaiement=?, etat=?, dateenregistrement=?, datereservation=? where idreserver=?";
		$params= array($iduser, $idtablerestaurant, $nbheures, $consignes, $modepaiement, $etat, $dateenregistrement, $datereservation, $idreserver);
		$this->db->request($sql, $params);
	}


	public function updateEtat($idreserver, $etat) {
		$sql= "update reserver set etat=? where idreserver=?";
		$params= array($etat, $idreserver);
		$this->db->request($sql, $params);
	}


	public function delete($idreserver) {
		$sql= "delete from reserver where idreserver=?";
		$params= array($idreserver);
		$this->db->request($sql, $params);
	}
}


?>