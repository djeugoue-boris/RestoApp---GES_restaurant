<?php

$users = $userdb->readRole('Client');
$menus = $menudb->readAll();

?>

<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		<div class="text-right">
	    		<a href="app.php?view=commande" class="btn btn-info">
		            <i class="fas fa-book"></i>
		            &nbsp;
		            Liste des commandes
	        	</a>
    		</div>



    		<br /><br />

    		<div>
    			<form name="form" method="POST" action="controller/commandeController.php?action=create" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Ajouter une commande
    					</legend>


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