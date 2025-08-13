<?php 
session_start();

?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

		<title>Resto App - Connexion</title>


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


		<link rel="stylesheet" type="text/css" href="css/style1.css">



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
	<body id="">
	<section>
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="controller/connexionController.php">
                    <h2>Login</h2>
                    <div class="inputbox"><ion-icon name="mail-outline"></ion-icon> <input type="email" name="email" required>
                        <label>Email</label>

                    </div>
                    <div class="inputbox"><ion-icon name="lock-closed-outline"></ion-icon> <input type="password" name="password" required>
                        <label>Password</label>

                    </div>
                    <div class="forget"><label><input type="checkbox">Remember Me</label> <a href="#">Forgot Password</a>
                    </div>
                    <button>Login</button>
                    <div class="register"> <p>Don't have an account ? <a href="#">Sign up</a></p>  
                    </div>
                    
                </form>
            </div>
        </div>
    </section>






		<!-- **** Gestion du javascript **** -->
		<script type="text/javascript" src="js/script.js"></script>


			<?php 
					if(isset($_SESSION['error'])){
						
						$error = $_SESSION['error'];
			 ?>

			 		<script type="text/javascript">
			 			
			 			swal.fire({

			 				icon:'<?php echo $error['type'] ?>',
			 				text:'<?php echo $error['message']  ?>'
			 			})

			 		</script>


			 <?php

			unset($_SESSION['error']);

					}
			 ?>





	</body>
</html>