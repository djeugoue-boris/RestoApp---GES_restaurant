<?php

require_once 'controller.php';


$action= $_REQUEST['action'];


if($action == 'create') {
	$iduser= $package->escapeField($_REQUEST['iduser']);
	$idmenu= $package->escapeField($_REQUEST['idmenu']);
	$qte= $package->escapeField($_REQUEST['qte']);
    $heure= date('H:i:s');
    $datecommande= date('Y-m-d');
	$etat= 'En attente';


    $commandedb->create($iduser, $idmenu, $qte, $heure, $datecommande, $etat);


	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Commande ajoutée avec succès'
	);

	header('Location:../app.php?view=commande');

}







if($action == 'update') {
	$idcommande= $package->escapeField($_REQUEST['idcommande']);
	$iduser= $package->escapeField($_REQUEST['iduser']);
	$idmenu= $package->escapeField($_REQUEST['idmenu']);
    $qte= $package->escapeField($_REQUEST['qte']);
    $heure= $package->escapeField($_REQUEST['heure']);
    $datecommande= $package->escapeField($_REQUEST['datecommande']);
	$etat= $package->escapeField($_REQUEST['etat']);


	$commandedb->update($idcommande, $iduser, $idmenu, $qte, $heure, $datecommande, $etat);

	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Commande modifiée avec succès'
	);

	header('Location:../app.php?view=commande');
}




if($action == 'delete') {
	$idcommande= $_REQUEST['idcommande'];
	$commandedb->delete($idcommande);

	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Commande supprimée avec succès'
	);

	header('Location:../app.php?view=commande');
}





?>