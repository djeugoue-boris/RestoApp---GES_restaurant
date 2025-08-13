<?php

require_once 'controller.php';

$action= $_REQUEST['action'];


if($action == 'create') {
	$nom= $package->escapeField($_REQUEST['nom']);
	$prenom= $package->escapeField($_REQUEST['prenom']);
	$telephone= $package->escapeField($_REQUEST['telephone']);
    $email= $package->escapeField($_REQUEST['email']);
    $password= $package->escapeField($_REQUEST['password']);
    $role= $package->escapeField($_REQUEST['role']);


	$user= $userdb->readCompte($email, $password);
	 

	if($user == false) {
		$userdb->create($nom,$prenom,$telephone,$email,$password,$role);

		$_SESSION['error']= array(
			'type' => 'info', 
			'message' => 'Utilisateur ajouté avec succès'
		);

		header('Location:../app.php?view=user');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Cet utilisateur existe déjà'
		);

		header('Location:../app.php?view=user_create');
	}
}







if($action == 'update') {
	$iduser= $package->escapeField($_REQUEST['iduser']);
	$nom= $package->escapeField($_REQUEST['nom']);
	$prenom= $package->escapeField($_REQUEST['prenom']);
	$telephone= $package->escapeField($_REQUEST['telephone']);
    $email= $package->escapeField($_REQUEST['email']);
    $password= $package->escapeField($_REQUEST['password']);
    $role= $package->escapeField($_REQUEST['role']);

	$user= $userdb->readCompte($email, $password);
	

	if($user == false || ($user != false && $user->iduser == $iduser)) {
		$userdb->update($iduser, $nom, $prenom, $telephone, $email, $password, $role);

		$_SESSION['error']= array(
			'type' => 'info', 
			'message' => 'Utilisateur modifié avec succès'
		);

		header('Location:../app.php?view=user');
	}
	else {
		$_SESSION['error']= array(
			'type' => 'error', 
			'message' => 'Une erreur est survenue'
		);

		header('Location:../app.php?view=user_update&iduser='. $iduser);
	}
}




if($action == 'delete') {
	$iduser= $_REQUEST['iduser'];
	$userdb->delete($iduser);

	$_SESSION['error']= array(
			'type' => 'success', 
			'message' => 'Utilisateur supprimé avec succès'
		);

	header('Location:../app.php?view=user');
}


?>






