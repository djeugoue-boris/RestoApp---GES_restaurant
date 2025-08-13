<?php

$idtypetable= $_REQUEST['idtypetable'];
$typetable= $typetabledb->read($idtypetable);

?>


<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		<div class="text-right">
	    		<a href="app.php?view=typetable" class="btn btn-info">
		            <i class="fas fa-book"></i>
		            &nbsp;
		            Liste des types tables
	        	</a>
    		</div>



    		<br /><br />

    		<div>
    			<form name="form" method="POST" action="controller/typetableController.php?action=update" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Modifier un type table
    					</legend>

    					<div class="form-group">
    						<label for="idtypetable">
    							ID TYPE TABLE
    						</label>
    						<input type="text" name="idtypetable" id="idtypetable" class="form-control" required readonly value="<?= $typetable->idtypetable ?>" />
    					</div>

    					<div class="form-group">
    						<label for="intitule">
    							Entrez l'intitule
    						</label>
    						<input type="text" name="intitule" id="intitule" class="form-control" required value="<?= $typetable->intitule ?>" />
    					</div>

    					<div class="text-right">
    						<input type="submit" name="modifier" value="Modifier" class="btn btn-success" />
    					</div>
    				</fieldset>
    			</form>
    		</div>

	      
        </div>
    </div>
</section>