<?php

$reservers= $reserverdb->readAll();

?>


<section>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <h3>
                Liste des réservations
            </h3>
            <hr />



            <div class="text-right">
                <a href="app.php?view=reserver_create" class="btn btn-info">
                    <i class="fas fa-plus"></i>
                    &nbsp;
                    Ajouter un réservation
                </a>
            </div>




            <br /><br />



            <div class="input-group" id="recherche">
                <span class="input-group-addon">
                    <i class="fas fa-search"></i>   
                </span>

                <input type="search" name="search" id="search" class="search form-control" placeholder="Rechercher...">
            </div>
        


            <hr />


            <div class="col-md-12 text-center table-responsive" id="elements">
                <table class="table table-hover text-center">
                    <tr class="bg-info">
                        <td>N°</td>
                        <td>NB HEURES</td>
                        <td>CONSIGNES</td>
                        <td>ENREGISTRER LE</td>
                        <td>RESERVER LE</td>
                        <td>MODE DE PAIEMENT</td>
                        <td>ETAT</td>
                        <td>OPTIONS</td>
                    </tr>

<?php

if($reservers != null && sizeof($reservers) > 0) {

    $i= 0;
    foreach ($reservers as $reserver) {   
        $i++;
        $update= 'app.php?view=reserver_update&idreserver='.$reserver->idreserver;
        $delete= 'controller/reserverController.php?action=delete&idreserver='.$reserver->idreserver;

        $user= $userdb->read($reserver->iduser);
        $tablerestaurant= $tablerestaurantdb->read($reserver->idtablerestaurant);

?>

                    <tr class="element">
                        <td class="data"><?= $i ?></td>
                        <td class="data"><?= $reserver->nbheures ?></td>
                        <td class="data"><?= $reserver->consignes ?></td>
                        <td class="data"><?= $reserver->dateenregistrement ?></td>
                        <td class="data"><?= $reserver->datereservation ?></td>
                        <td class="data"><?= $reserver->modepaiement ?></td>
                        <td class="data"><?= $reserver->etat ?></td>

                        <td>
                            <a href="<?= $update ?>" class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= $delete ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>


<?php

    }

}

?>

                </table>
            </div>   
        </div>
    </div>
</section>