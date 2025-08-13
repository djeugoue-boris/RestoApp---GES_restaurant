
<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		<div class="text-right">
	    		<a href="app.php?view=user" class="btn btn-info">
		            <i class="fas fa-book"></i>
		            &nbsp;
		            Liste des utilisateurs
	        	</a>
    		</div>



    		<br /><br />

    		<div>
    			<form name="form" method="POST" action="controller/userController.php?action=create" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Ajouter un utilisateur
    					</legend>

    					<div class="form-group">
    						<label for="nom">
    							Entrez le nom
    						</label>
    						<input type="text" name="nom" id="nom" class="form-control" required />
    					</div>

    					<div class="form-group">
    						<label for="prenom">
                                    Entrez le prenom
                            </label>
                            <input type="text" name="prenom" id="prenom" class="form-control" required />
                        </div>

                        
                        <div class="form-group">
                            <label for="telephone">
                                Entrez le numéro de téléphone
                            </label>    
                            <input type="tel" name="telephone" id="telephone" class="form-control" />
                        </div>


                        <div class="form-group">
                            <label for="email">
    							Entrez l'email
    						</label>
    						<input type="email" name="email" id="email" class="form-control" required />
    					</div>


    					<div class="form-group">
    						<label for="email">
    							Entrez le password
    						</label>
    						<input type="password" name="password" id="password" class="form-control" required />
    					</div>


                        <div class="form-group">
                            <label for="role">
                                Sélectionnez le rôle
                            </label>
                            <select name="role" class="form-control">
                                <option value="Administrateur">
                                    Administrateur
                                </option>
                                <option value="Serveur">
                                   Serveur
                                </option>
                                <option value="Client">
                                    Client
                                </option>
                            </select>
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