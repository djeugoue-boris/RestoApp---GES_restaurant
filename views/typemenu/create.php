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
    			<form name="form" method="POST" action="controller/typemenuController.php?action=create" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Ajouter un type menu
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