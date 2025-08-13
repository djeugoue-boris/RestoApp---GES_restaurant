<?php

$commandes= $commandedb->readAll();

?>


<section>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <h3>
                Liste des commandes
            </h3>
            <hr />


            <div class="text-right">
                <a href="app.php?view=commande_create" class="btn btn-info">
                    <i class="fas fa-plus"></i>
                    &nbsp;
                    Ajouter un commande
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
                        <td>CLIENT</td>
                        <td>MENU</td>
                        <td>PU<br />(<b>FCFA</b>)</td>
                        <td>QTE</td>
                        <td>MONTANT<br />(<b>FCFA</b>)</td>
                        <td>HEURE</td>
                        <td>DATE</td>
                        <td>ETAT</td>
                        <td>OPTIONS</td>
                    </tr>

<?php

if($commandes != null && sizeof($commandes) > 0) {

    $i= 0;
    foreach ($commandes as $commande) {   
        $i++;

        $update= 'app.php?view=commande_update&idcommande='.$commande->idcommande;
        $delete= 'controller/commandeController.php?action=delete&idcommande='.$commande->idcommande;

        $user= $userdb->read($commande->iduser);
        $menu= $menudb->read($commande->idmenu);

        $montant= intval($commande->qte) * floatval($menu->prix);

?>

                    <tr class="element">
                        <td class="data"><?=$i ?></td>
                        <td class="data"><?=$user->nom ?></td>
                        <td class="data"><?=$menu->intitule ?></td>
                        <td class="data"><?=$menu->prix ?></td>
                        <td class="data"><?=$commande->qte ?></td>
                        <td class="data"><?=$montant ?></td>
                        <td class="data"><?=$commande->heure ?></td>
                        <td class="data"><?=$commande->datecommande ?></td>
                        <td class="data"><?=$commande->etat ?></td>

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