<?php

$idtypemenu= $_REQUEST['idtypemenu'];
$typemenu= $typemenudb->read($idtypemenu);

?>

<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		<div class="text-right">
	    		<a href="app.php?view=typemenu" class="btn btn-info">
		            <i class="fas fa-book"></i>
		            &nbsp;
		            Liste des types de menus

	        	</a>
    		</div>



    		<br /><br />

    		<div>
    			<form name="form" method="POST" action="controller/typemenuController.php?action=update" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Modifier un type menu
    					</legend>

    					<div class="form-group">
    						<label for="idtypemenu">
    							ID TYPE MENU
    						</label>
    						<input type="text" name="idtypemenu" id="idtypemenu" class="form-control" required readonly value="<?= $typemenu->idtypemenu ?>" />
    					</div>

    					<div class="form-group">
    						<label for="intitule">
    							Entrez l'intitule
    						</label>
    						<input type="text" name="intitule" id="intitule" class="form-control" required value="<?= $typemenu->intitule ?>" />
    					</div>

    					<div class="text-right">
    						<input type="submit" name="modifier" value="Modifier" class="btn btn-success">
    					</div>
    				</fieldset>
    			</form>
    		</div>

	      
        </div>
    </div>
</section>