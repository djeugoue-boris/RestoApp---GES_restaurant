<?php
require_once 'controller.php';

//Supprimer toutes les variables de la session
session_unset();


$_SESSION['error']= array(
	'type' => 'info', 
	'message' => 'Merci pour votre visite'
);


header('Location:../connexion.php');

?>