<?php

require_once 'controller.php';


$action= $_REQUEST['action'];


if($action == 'create') {
	$intitule= $package->escapeField($_REQUEST['intitule']);
	
	$typemenu= $typemenudb->readIntitule($intitule);
	
	if($typemenu == false ) {
		$typemenudb->create($intitule);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'type de menu ajouté avec succès'
		);

		header('Location:../app.php?view=typemenu');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Ce type de menu existe déjà'
		);

		header('Location:../app.php?view=typemenu_create');
	}
}







if($action == 'update') {
	$idtypemenu= $package->escapeField($_REQUEST['idtypemenu']);
	$intitule= $package->escapeField($_REQUEST['intitule']);
	
	$typemenu= $typemenudb->readIntitule($intitule);
	
	
	if($typemenu == false || ($typemenu != false && $typemenu->idtypemenu == $idtypemenu)) {
		$typemenudb->update($idtypemenu, $intitule);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'type de menu modifié avec succès'
		);

		header('Location:../app.php?view=typemenu');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Une erreur est survenue'
		);

		header('Location:../app.php?view=typemenu_update&idtypemenu='. $idtypemenu);
	}
}







if($action == 'delete') {
	$idtypemenu= $_REQUEST['idtypemenu'];
	$typemenudb->delete($idtypemenu);

	$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'type de menu supprimé avec succès'
		);

	header('Location:../app.php?view=typemenu');
}


?>






