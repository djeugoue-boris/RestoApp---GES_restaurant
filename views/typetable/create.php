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
    			<form name="form" method="POST" action="controller/typetableController.php?action=create" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Ajouter un type table
    					</legend>

    					<div class="form-group">
    						<label for="intitule">
    							Entrez l'intitule
    						</label>
    						<input type="text" name="intitule" id="intitule" class="form-control" required />
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