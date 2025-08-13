<?php

$idcommande= $_REQUEST['idcommande'];
$commande= $commandedb->read($idcommande);
$user= $userdb->read($commande->iduser);
$menu= $menudb->read($commande->idmenu);

$users= $userdb->readRole('Client');
$menus= $menudb->readAll();

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
    			<form name="form" method="POST" action="controller/commandeController.php?action=update" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Modifier une commande
    					</legend>


                        <div class="form-group">
                            <label for="idcommande">
                                ID COMMANDE
                            </label>
                            <input type="text" name="idcommande" id="idcommande" class="form-control" required readonly value="<?= $commande->idcommande ?>" />
                        </div>


    					<div class="form-group">
                            <label>
                                  Sélectionnez un Client
                            </label>

                            <select class="form-control" name="iduser">
                                <option value="<?= $user->iduser ?>" selected class="none">
                                    <?= $user->nom ?> -
                                    <?= $user->telephone ?>
                                </option>

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
                                <option value="<?= $user->iduser ?>" selected class="none">
                                    <?= $menu->intitule ?> -
                                    <?= $menu->prix ?> FCFA
                                </option>

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
                            <input type="number" name="qte" id="qte" class="form-control" required value="<?= $commande->qte ?>" >
                        </div>


                        <div class="form-group">
                            <label for="heure">
                                Entrez l'heure
                            </label>
                            <input type="time" name="heure" id="heure" class="form-control" required value="<?= $commande->heure ?>" >
                        </div>


                        <div class="form-group">
                            <label for="datecommande">
                                Entrez la date de la commande
                            </label>
                            <input type="date" name="datecommande" id="datecommande" class="form-control" required value="<?= $commande->datecommande ?>" />
                        </div>


                        <div class="form-group">
                            <label for="l'etat">
                                Entrez l'etat
                            </label>

                            <select name="etat" id="etat" class="form-control">
                                <option value="<?= $commande->etat ?>" selected class="none">
                                    <?= $commande->etat ?>
                                </option>


                                <option value="En attente">
                                    En attente
                                </option>
                                <option value="Validée">
                                    Validée
                                </option>
                                <option value="Annulée">
                                    Annulée
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