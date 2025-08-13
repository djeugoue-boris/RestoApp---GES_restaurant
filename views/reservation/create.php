<?php

$users = $userdb->readRole('Client');
$tablerestaurants =$tablerestaurantdb->readAll();

?>


<section class="animate__animated animate__lightSpeedInRight">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <div class="text-right">
                <a href="app.php?view=reserver" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    &nbsp;
                    Liste des reservations
                </a>
            </div>



            <br /><br />

            <div>
                <form name="form" method="POST" action="controller/reserverController.php?action=create" enctype="multipart/form-data" >
                    <fieldset>
                        <legend>
                            Ajouter une reservation
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
                                  Sélectionnez une Table
                            </label>

                            <select class="form-control" name="idtablerestaurant">
                                
                            <?php
                            foreach($tablerestaurants as $tablerestaurant){
                            ?>
                                <option value="<?= $tablerestaurant->idtablerestaurant ?>">
                                    <?= $tablerestaurant->code ?> -
                                    <?= $tablerestaurant->nbplaces ?> Place(s) -
                                    <?= $tablerestaurant->prix ?> FCFA
                                </option>
                            <?php 
                            }
                            ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="nbheures">
                                Entrez le nombre d'heures
                            </label>
                            <input type="number" name="nbheures" id="nbheures" class="form-control" required />
                        </div>


                        <div class="form-group">
                            <label for="consignes">
                                    Quelles sont les consignes ?
                            </label>
                            <textarea name="consignes" id="consignes" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="modepaiement">
                                Entrez le mode de paiement
                            </label>
                            <input type="text" name="modepaiement" id="modepaiement" class="form-control" />
                        </div>


                        <div class="form-group">
                            <label for="etat">
                                Entrez  l'etat
                            </label>

                            <select name="etat" id="etat" class="form-control">
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



                        <div class="form-group">
                            <label for="dateenregistrement">
                                Entrez la date d'enregistrement
                            </label>
                            <input type="date" name="dateenregistrement" id="dateenregistrement" class="form-control" required value="<?= date('Y-m-d') ?>" />
                        </div>



                        <div class="form-group">
                            <label for="datereservation">
                                Vous voulez réserver la table pour quel jour ?
                            </label>
                            <input type="date" name="datereservation" id="datereservation" class="form-control" required value="<?= date('Y-m-d') ?>" />
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
