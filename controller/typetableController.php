<?php

require_once 'controller.php';


$action= $_REQUEST['action'];


if($action == 'create') {
	$intitule= $package->escapeField($_REQUEST['intitule']);

	$typetable= $typetabledb->readIntitule($intitule);
	
	if($typetable == false) {
		$typetabledb->create($intitule);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'type de table ajouté avec succès'
		);

		header('Location:../app.php?view=typetable');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Ce type de table existe déjà'
		);

		header('Location:../app.php?view=typetable_create');
	}
}







if($action == 'update') {
	$idtypetable= $package->escapeField($_REQUEST['idtypetable']);
	$intitule= $package->escapeField($_REQUEST['intitule']);
	
	$typetable= $typetabledb->readIntitule($intitule);
	
	if($typetable == false || ($typetable != false && $typetable->idtypetable == $idtypetable)) {
		$typetabledb->update($idtypetable, $intitule);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'type de table modifié avec succès'
		);

		header('Location:../app.php?view=typetable');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Une erreur est survenue'
		);

		header('Location:../app.php?view=typetable_update&idtypetable='. $idtypetable);
	}
}




if($action == 'delete') {
	$idtypetable= $_REQUEST['idtypetable'];
	$typetabledb->delete($idtypetable);

	$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'type de table supprimé avec succès'
		);

	header('Location:../app.php?view=typetable');
}


?>






