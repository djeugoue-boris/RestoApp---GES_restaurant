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

		<title>Resto App - Administration</title>


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
		<!-- *********** Gestion du menu ********** -->
			<section id="app_menu">
				<span id="menu_close">
					<i class="fas fa-times"></i>
				</span>

				<div id="logo">
					Resto App
				</div>

				<div id="profil">
					<!-- <div class="profil_img">
						<img src="img/photo.png" alt="Profil" />
					</div> -->
					<div class="profil_username">
						<?= $_SESSION['profil']->nom ?>

						<br /><br/>

						<a href="app.php?view=profil">
							<i class="fa fa-user"></i>
						</a>
						<a href="controller/deconnexionController.php">
							<i class="fas fa-sign-out-alt text-danger"></i>
						</a>						
					</div>
				</div>

				<hr />

				<div id="menu">
					<a href="app.php?view=dashboard">
						<i class="fas fa-tachometer-alt"></i>
						&nbsp;
						<span>Tableau de Bord</span>
					</a>


					<a href="app.php?view=commande">
						<i class="fas fa-book"></i>
						&nbsp;
						<span>Commandes</span>
					</a>


					<a href="app.php?view=reserver">
						<i class="fa fa-book"></i>
						&nbsp;
						<span>Réservations</span>
					</a>


					<a href="app.php?view=menu">
						<i class="fa fa-bars"></i>
						&nbsp;
						<span>Menus</span>
					</a>


					<a href="app.php?view=typemenu">
							<i class="fa fa-book"></i>
					    &nbsp;
					    <span>Types de menus</span>
					</a>


					<a href="app.php?view=typetable">
						<i class="fa fa-book"></i>
					    &nbsp;  
				    <span>Types de tables</span>
					</a>


					<a href="app.php?view=tablerestaurant">
						<i class="fa fa-book"></i>
				    &nbsp;
				    <span>Tables</span>
					</a>


					<a href="app.php?view=user">
						<i class="fa fa-users"></i>
				    &nbsp;
				    <span>Utilisateurs</span>
					</a>

				</div>


			</section>


		<!-- *********** Fin Gestion du menu ********** -->










		<!-- *********** Gestion du contenu ********** -->

		<section id="app_container">
			<!-- ======== Gestion de l'entete -->
			<div id="app_header">		
				<div class="header_info">
					<i class="fas fa-bars" id="menu_tool"></i>
				</div>

				<div class="header_tools">

					<a class="btn btn-success" href="addcommande.php">
						<i class="fas fa-plus fa-spin"></i>
						&nbsp;
				    <span>Ajouter une commande</span>
					</a>


					<a class="btn btn-info" href="commande.php">
						<i class="fas fa-book"></i>
						&nbsp;
				    <span>Commandes</span>
					</a>


					<a class="btn btn-danger" href="controller/deconnexionController.php">
						<i class="fas fa-sign-out-alt"></i>
					</a>
				</div>
			</div>


			<!-- ======== Gestion des modules -->
			<div id="app_module">
			<?php
			if($view == null) {
				include('views/dashboard.php');
			}
			else if($view == 'dashboard') {
				include('views/dashboard.php');
			}


			else if($view == 'user') {
				include('views/user/index.php');
			}
			else if($view == 'user_create') {
				include('views/user/create.php');
			}
			else if($view == 'user_update') {
				include('views/user/update.php');
			}


			else if($view == 'menu') {
				include('views/menu/index.php');
			}
			else if($view == 'menu_create') {
				include('views/menu/create.php');
			}
			else if($view == 'menu_update') {
				include('views/menu/update.php');
			}


      else if($view == 'tablerestaurant') {
				include('views/tablerestaurant/index.php');
			}
			else if($view == 'tablerestaurant_create') {
				include('views/tablerestaurant/create.php');
			}
			else if($view == 'tablerestaurant_update') {
				include('views/tablerestaurant /update.php');
			}


      else if($view =='typemenu') {
				include('views/typemenu/index.php');
			}
			else if($view =='typemenu_create') {
				include('views/typemenu/create.php');
			}
			else if($view =='typemenu_update') {
				include('views/typemenu/update.php');
			}

            
      if($view == 'typetable') {
				include('views/typetable/index.php');
			}
			else if($view =='typetable_create') {
				include('views/typetable/create.php');
			}
			else if($view =='typetable_update') {
				include('views/typetable/update.php');
			}


      else if($view =='commande') {
				include('views/commande/index.php');
			}
			else if($view =='commande_create') {
				include('views/commande/create.php');
			}
			else if($view == 'commande_update') {
				include('views/commande/update.php');
			}


			else if($view =='reserver') {
				include('views/reservation/index.php');
			}
			else if($view =='reserver_create') {
				include('views/reservation/create.php');
			}
			else if($view == 'reserver_update') {
				include('views/reservation/update.php');
			}


			else if($view == 'profil') {
				include('views/profil.php');
			}



		?>
			</div>


			<!-- ======== Gestion du footer -->
			<div id="app_footer">
				Copyright &copy 2022 Resto App
			</div>

		</section>


		<!-- *********** Fin Gestion du contenu ********** -->




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