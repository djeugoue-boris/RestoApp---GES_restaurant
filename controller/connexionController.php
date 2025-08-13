<?php 
require_once 'controller.php';

$email= $package->escapeField($_REQUEST['email']);
$password= $package->escapeField($_REQUEST['password']);

$user = $userdb->readCompte($email, $password);


if($user == false){
	$_SESSION['error'] = array(
		 'type' => 'warning',
		 'message'=> 'Echec de connexion'
	);
	header('Location:../connexion.php');
}
else {
	$_SESSION['profil'] = $user;
	
	$_SESSION['error'] = array(
		 'type' => 'info',
		 'message'=> 'Bienvenue '.$_SESSION['profil']->nom
	);
	header('Location:../app.php');
}







 ?>