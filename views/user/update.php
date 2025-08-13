<?php

$iduser= $_REQUEST['iduser'];
$user= $userdb->read($iduser);

?>


<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		<div class="text-right">
	    		<a href="app.php?view=user" class="btn btn-info">
		            <i class="fas fa-user"></i>
		            &nbsp;
		            Liste des utilisateurs
	        	</a>
    		</div>



    		<br /><br />

    		<div>
    			<form name="form" method="POST" action="controller/userController.php?action=update" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Modifier un utilisateur
    					</legend>

    					<div class="form-group">
    						<label for="iduser">
    							ID USER
    						</label>
    						<input type="text" name="iduser" id="iduser" class="form-control" required readonly value="<?= $user->iduser ?>" />
    					</div>


    					<div class="form-group">
    						<label for="nom">
    							Entrez le nom
    						</label>
    						<input type="nom" name="nom" id="nom" class="form-control" required value="<?= $user->nom ?>" />
    					</div>



                         <div class="form-group">
                            <label for="prenom">
                                Entrez le prénom
                            </label>
                            <input type="prenom" name="prenom" id="prenom" class="form-control" required value="<?= $user->nom ?>" />
                        </div>


                        <div class="form-group">
                            <label for="telephone">
                                Entrez le numéro de téléphone
                            </label>    
                            <input type="tel" name="telephone" id="telephone" class="form-control" value="<?= $user->telephone ?>" />
                        </div>


                        <div class="form-group">
                            <label for="email">
    							Entrez l'adresse email
    						</label>
    						<input type="email" name="email" id="email" class="form-control" required value="<?= $user->email ?>" />
    					</div>


                        <div class="form-group">
                            <label for="password">
                                 Entrez le mot de passe
                            </label>
                            <input type="password" name="password" id="password" class="form-control" required value="<?= $user->password ?>" />
                        </div>


                        <div class="form-group">
                            <label for="role">
                                Sélectionnez le rôle
                            </label>
                            <select name="role" class="form-control">
                                <option value="<?= $user->role ?>" selected class="none">
                                    <?= $user->role ?>
                                </option>

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
    						<input type="submit" name="modifier" value="Modifier" class="btn btn-success">
    					</div>
    				</fieldset>
    			</form>
    		</div>

	      
        </div>
    </div>
</section>