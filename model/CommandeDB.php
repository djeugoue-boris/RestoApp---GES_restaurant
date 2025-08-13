<?php
require_once 'Database.php';

class CommandeDB {
	private $db;

	public function __construct() {
		$this->db= new Database();
	}



	public function create($iduser, $idmenu, $qte, $heure, $datecommande, $etat) {
		$sql= "insert into commande set iduser=?, idmenu=?, qte=?, heure=?, datecommande=?, etat=?";
		$params= array($iduser, $idmenu, $qte, $heure, $datecommande, $etat);
		$this->db->request($sql, $params);
	}


	public function read($idcommande) {
		$sql= "select * from commande where idcommande=?";
		$params= array($idcommande);
		$req= $this->db->request($sql, $params);
		$data= $this->db->recover($req, true);
		return $data;
	}


	public function readIduser($iduser) {
		$sql= "select * from commande where iduser=?";
		$params= array($iduser);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readIdmenu($idmenu) {
		$sql= "select * from commande where idmenu=?";
		$params= array($idmenu);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}

	
    public function readHeure($heure) {
		$sql= "select * from commande where heure=?";
		$params= array($heure);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readQte($qte) {
		$sql= "select * from commande where qte=?";
		$params= array($qte);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readEtat($etat) {
		$sql= "select * from commande where etat=?";
		$params= array($etat);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readDatecommande($datecommande) {
		$sql= "select * from commande where datecommande=?";
		$params= array($datecommande);
		$req= $this->db->request($sql, $params);
		$datas= $this->db->recover($req, false);
		return $datas;
	}


	public function readAll() {
		$sql= "select * from commande order by idcommande desc";
		$req= $this->db->request($sql);
		$datas= $this->db->recover($req, false);
		return $datas;
	}



	public function update($idcommande, $iduser, $idmenu, $qte, $heure, $datecommande, $etat) {
		$sql= "update commande set iduser=?, idmenu=?, qte=?, heure=?, datecommande=?, etat=? where idcommande=?";
		$params= array($iduser, $idmenu, $qte, $heure, $datecommande, $etat, $idcommande);
		$this->db->request($sql, $params);
	}


	public function updateEtat($idcommande, $etat) {
		$sql= "update commande set etat=? where idcommande=?";
		$params= array($etat, $idcommande);
		$this->db->request($sql, $params);
	}



	public function delete($idcommande) {
		$sql= "delete from commande where idcommande=?";
		$params= array($idcommande);
		$this->db->request($sql, $params);
	}
}


?>