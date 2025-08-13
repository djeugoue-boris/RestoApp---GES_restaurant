<?php
session_start();

//Supprimer toutes les variables de la session
//session_unset();



/****************** Gestion du Profil ***********************/

if(isset($_SESSION['profil']) != true) {
  header('Location:connexion.php');
}

/**************** Fin Gestion du Profil *********************/








/******************** Gestion du Model **********************/

require_once 'model/UserDB.php';
require_once 'model/CommandeDB.php';
require_once 'model/MenuDB.php';
require_once 'model/ReserverDB.php';
require_once 'model/TablerestaurantDB.php';
require_once 'model/TypemenuDB.php';
require_once 'model/TypetableDB.php';

require_once 'manage/Package.php';
require_once 'manage/Upload.php';
//require_once 'manage/SwiftMailerClass.php';
// require_once 'manage/PJmailClass.php';

$userdb= new UserDB();
$commandedb= new CommandeDB();
$menudb= new MenuDB();
$reserverdb= new ReserverDB();
$tablerestaurantdb= new TablerestaurantDB();
$typemenudb= new TypemenuDB();
$typetabledb = new TypetableDB();

$package= new Package();
$upload= new Upload();
//$swiftmailer= new SwiftMailerClass();
//$pjmail= new PJmailClass();

/**************** Fin Gestion du Model ********************/







/****************** Gestion de la vue *******************/

$view = null;
if(isset($_GET['view']) == true) {
	$view = $_GET['view'];
}

/**************** Fin Gestion de la vue *****************/



?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

		<title>Resto App - Commandes</title>


		<!-- ******** Gestion du CSS ****** -->
		<link rel="icon" type="image/x-icon" href="img/favicon.ico" />

		<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">

		<!-- Inputs file personnalisés -->
		<link rel="stylesheet" type="text/css" href="css/fileinput/fileinput.css">

		<!-- Select personnalisé -->
		<link rel="stylesheet" type="text/css" href="css/chosen/prism.css">
		<link rel="stylesheet" type="text/css" href="css/chosen/chosen.css">


		<link rel="stylesheet" type="text/css" href="css/style.css">



		<!-- **** Gestion du Javascript **** -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<!-- Alertes personnalisées -->
		<script type="text/javascript" src="js/sweetalert2.all.min.js"></script>

		<!--Déssiner des graphes -->
		<script type="text/javascript" src="js/highcharts/highcharts.js"></script>
		<script type="text/javascript" src="js/highcharts/exporting.js"></script>
		<script type="text/javascript" src="js/highcharts/export-data.js"></script>

		<!-- Input file personnalisé -->
		<script type="text/javascript" src="js/fileinput/plugins/piexif.min.js"></script>
		<script type="text/javascript" src="js/fileinput/plugins/purify.min.js"></script>
		<script type="text/javascript" src="js/fileinput/plugins/sortable.min.js"></script>
		<script type="text/javascript" src="js/fileinput/fileinput.min.js"></script>
		<script type="text/javascript" src="js/fileinput/locales/fr.js"></script>
		<script type="text/javascript" src="js/fileinput/themes/fas/theme.min.js"></script>


		<!--select personnalisé -->
		<script type="text/javascript" src="js/chosen/chosen.jquery.js"></script>
		<script type="text/javascript" src="js/chosen/prism.js"></script>
		<script type="text/javascript" src="js/chosen/init.js"></script>




		<!-- **** Gestion des anciens navigateurs (IE) **** -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.min.js"></script>
			<script type="text/javascript" src="js/html5shiv-printshiv.min.js"></script>
			<script type="text/javascript" src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<?php

		$users = $userdb->readRole('Client');
		$menus = $menudb->readAll();

		?>


		<br /><br /><br />

		<section class="container text-center">
			<a href="app.php?view=dashboard" class="btn btn-default">
        <i class="fas fa-book"></i>
        &nbsp;
        Revenir à l'Administration
      </a>


  		<a href="app.php?view=commande" class="btn btn-info">
        <i class="fas fa-book"></i>
        &nbsp;
        Liste des commandes
      </a>
		</section>


		<hr />


		<section class="container animate__animated animate__lightSpeedInRight">
			<div class="row">
		    	<div class="col-xs-offset-1 col-md-offset-3 col-xs-10 col-md-6 col-xs-offset-1 col-md-offset-3">

		    		<div>
		    			<form name="form" method="POST" action="controller/commandeController.php?action=create" enctype="multipart/form-data" >
		    				<fieldset>
		    					<legend>
		    						Ajouter une commande
		    					</legend>

		    					<br />

                  <div class="form-group">
                      <label>
                            Sélectionnez un Client
                      </label>

                      <select class="form-control" name="iduser">
                          
                      <?php
                      foreach($users as $user){
                      ?>
                          <option value="<?= $user->iduser ?>">
                              <?= $user->nom ?> -
                              <?= $user->telephone ?>
                          </option>
                      <?php 
                      }
                      ?>

                      </select>
                  </div>


                  <div class="form-group">
                      <label>
                            Sélectionnez le menu
                      </label>

                      <select class="form-control" name="idmenu">
                          
                      <?php
                      foreach($menus as $menu){
                      ?>
                          <option value="<?= $user->iduser ?>">
                              <?= $menu->intitule ?> -
                              <?= $menu->prix ?> FCFA
                          </option>
                      <?php 
                      }
                      ?>

                      </select>
                  </div>


                  <div class="form-group">
                      <label for="qte">
                          Entrez la quantité commandée
                      </label>
                      <input type="number" name="qte" id="qte" class="form-control" required value="1" >
                  </div>
		    					
		                        
		    					<div class="text-right">
		    						<input type="submit" name="enregistrer" value="Enregistrer" class="btn btn-success">
		    					</div>
		    				</fieldset>
		    			</form>
		    		</div>

			      
		        </div>
		    </div>
		</section>














		<!-- **** Gestion du javascript **** -->
		<script type="text/javascript" src="js/script.js"></script>




















		<?php 

		/****************** Gestion des Erreurs *******************/

		if (isset($_SESSION['error']) == true) {
			$error = $_SESSION['error'];

			$str= '';
			$str= $str . '<script type="text/javascript">';
			$str= $str . 'swal.fire({';
			$str= $str . 'icon: "' . $error['type'] . '",';
			$str= $str . 'text: "' . $error['message'] . '"';
			$str= $str . '});';
			$str= $str . '</script>';

			echo $str;

			unset($_SESSION['error']);
		}

		/**************** Fin Gestion des Erreurs *****************/

		?>



	</body>
</html>