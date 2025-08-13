<?php

require_once 'controller.php';


$prefix= 'tablerestaurant';
$width_limit= '500';
$height_limit= '500';
$path_folder= './ressources/tablerestaurant/';


$action= $_REQUEST['action'];


if($action == 'create') {
	$idtypetable= $package->escapeField($_REQUEST['idtypetable']);
	$code= $package->escapeField($_REQUEST['code']);
	$nbplaces= $package->escapeField($_REQUEST['nbplaces']);
	$prix= $package->escapeField($_REQUEST['prix']);
	
   
	$tablerestaurant= $tablerestaurantdb->readCode($code);
	

	if($tablerestaurant == false) {

		$image= '';
		if(isset($_FILES['image']) == true && $_FILES['image']['size'] != 0) {
			$image= $upload->upload_image($_FILES['image'], $prefix, $width_limit, $height_limit, $path_folder);
		}


		$tablerestaurantdb->create($idtypetable, $code, $nbplaces, $prix, $image);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'Table ajoutée avec succès'
		);

		header('Location:../app.php?view=tablerestaurant');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Cet table de restaurant existe déjà'
		);

		header('Location:../app.php?view=tablerestaurant_create');
	}
}







if($action == 'update') {
	$idtablerestaurant= $package->escapeField($_REQUEST['idtablerestaurant']);
	$idtypetable= $package->escapeField($_REQUEST['idtypetable']);
	$code= $package->escapeField($_REQUEST['code']);
	$nbplaces= $package->escapeField($_REQUEST['nbplaces']);
	$prix= $package->escapeField($_REQUEST['prix']);
	

	$tablerestaurant= $tablerestaurantdb->readCode($code);

	
	if($tablerestaurant == false || ($tablerestaurant != false && $tablerestaurant->idtablerestaurant == $idtablerestaurant)) {

		$tablerestaurant= $tablerestaurantdb->read($idtablerestaurant);

		$image= $tablerestaurant->image;
		if(isset($_FILES['image']) == true && $_FILES['image']['size'] != 0) {
			$image= $upload->upload_image($_FILES['image'], $prefix, $width_limit, $height_limit, $path_folder);
			unlink($path_folder . $tablerestaurant->image);
		}

		$tablerestaurantdb->update($idtablerestaurant, $idtypetable, $code, $nbplaces, $prix, $image);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'Table modifiée avec succès'
		);

		header('Location:../app.php?view=tablerestaurant');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Une erreur est survenue'
		);

		header('Location:../app.php?view=tablerestaurant_update&idtablerestaurant='. $idtablerestaurant);
	}
}




if($action == 'delete') {
	$idtablerestaurant= $_REQUEST['idtablerestaurant'];
	$tablerestaurant= $tablerestaurantdb->read($idtablerestaurant);

	unlink($path_folder . $tablerestaurant->image);
	$tablerestaurantdb->delete($idtablerestaurant);

	$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'Table supprimée avec succès'
		);

	header('Location:../app.php?view=tablerestaurant');
}


?>






