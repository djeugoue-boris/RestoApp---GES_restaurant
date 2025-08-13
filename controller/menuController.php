<?php

require_once 'controller.php';


$prefix= 'menu';
$width_limit= '500';
$height_limit= '500';
$path_folder= './ressources/menu/';


$action= $_REQUEST['action'];


if($action == 'create') {
	$idtypemenu= $package->escapeField($_REQUEST['idtypemenu']);
	$intitule= $package->escapeField($_REQUEST['intitule']);
	$prix= $package->escapeField($_REQUEST['prix']);
   

	$menu= $menudb->readIntitule($intitule);
	

	if($menu == false) {

		$image= '';
		if(isset($_FILES['image']) == true && $_FILES['image']['size'] != 0) {
			$image= $upload->upload_image($_FILES['image'], $prefix, $width_limit, $height_limit, $path_folder);
		}

		$menudb->create($idtypemenu,$intitule,$prix,$image);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'Menu ajouté avec succès'
		);

		header('Location:../app.php?view=menu');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Ce menu existe déjà'
		);

		header('Location:../app.php?view=menu_create');
	}
}







if($action == 'update') {
	$idmenu= $package->escapeField($_REQUEST['idmenu']);
	$idtypemenu= $package->escapeField($_REQUEST['idtypemenu']);
	$intitule= $package->escapeField($_REQUEST['intitule']);
	$prix= $package->escapeField($_REQUEST['prix']);

	$menu= $menudb->readIntitule($intitule);
	
	if($menu == false || ($menu != false && $menu->idmenu == $idmenu)) {

		$menu= $menudb->read($idmenu);

		$image= $menu->image;
		if(isset($_FILES['image']) == true && $_FILES['image']['size'] != 0) {
			$image= $upload->upload_image($_FILES['image'], $prefix, $width_limit, $height_limit, $path_folder);
			unlink($path_folder . $menu->image);
		}

		$menudb->update($idmenu, $idtypemenu, $intitule, $prix, $image);

		$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'Menu modifié avec succès'
		);

		header('Location:../app.php?view=menu');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Une erreur est survenue'
		);

		header('Location:../app.php?view=menu_update&idmenu='. $idmenu);
	}
}




if($action == 'delete') {
	$idmenu= $_REQUEST['idmenu'];
	$menu= $menudb->read($idmenu);

	unlink($path_folder . $menu->image);
	$menudb->delete($idmenu);

	$_SESSION['error']= array(
		'type' => 'success', 
		'message' => 'Menu supprimé avec succès'
	);

	header('Location:../app.php?view=menu');
}


?>






