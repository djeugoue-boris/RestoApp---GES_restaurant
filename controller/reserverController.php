<?php

require_once 'controller.php';


$action= $_REQUEST['action'];


if($action == 'create') {
	$iduser= $package->escapeField($_REQUEST['iduser']);
	$idtablerestaurant= $package->escapeField($_REQUEST['idtablerestaurant']);
	$nbheures= $package->escapeField($_REQUEST['nbheures']);
	$consignes= $package->escapeField($_REQUEST['consignes']);
	$modepaiement= $package->escapeField($_REQUEST['modepaiement']);
	$etat= $package->escapeField($_REQUEST['etat']);
	$dateenregistrement= $package->escapeField($_REQUEST['dateenregistrement']);
	$datereservation= $package->escapeField($_REQUEST['datereservation']);
   

	$reserverdb->create($iduser, $idtablerestaurant, $nbheures, $consignes, $modepaiement, $etat, $dateenregistrement, $datereservation);

	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Réservation ajoutée avec succès'
	);

	header('Location:../app.php?view=reserver');
}







if($action == 'update') {
	$idreserver= $package->escapeField($_REQUEST['idreserver']);
	$iduser= $package->escapeField($_REQUEST['iduser']);
	$idtablerestaurant= $package->escapeField($_REQUEST['idtablerestaurant']);
	$nbheures= $package->escapeField($_REQUEST['nbheures']);
	$consignes= $package->escapeField($_REQUEST['consignes']);
	$modepaiement= $package->escapeField($_REQUEST['modepaiement']);
	$etat= $package->escapeField($_REQUEST['etat']);
	$dateenregistrement= $package->escapeField($_REQUEST['dateenregistrement']);
	$datereservation= $package->escapeField($_REQUEST['datereservation']);

	$reserverdb->update($idreserver, $iduser, $idtablerestaurant, $nbheures, $consignes, $modepaiement, $etat, $dateenregistrement, $datereservation);

	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Réservation modifiée avec succès'
	);

	header('Location:../app.php?view=reserver');
}




if($action == 'delete') {
	$idreserver= $_REQUEST['idreserver'];
	$reserverdb->delete($idreserver);

	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Réservation supprimée avec succès'
	);

	header('Location:../app.php?view=reserver');
}


?>






