<?php

$tablerestaurants= $tablerestaurantdb->readAll();

?>


<section>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <h3>
                Liste des tables
            </h3>
            <hr />


            <div class="text-right">
                <a href="app.php?view=tablerestaurant_create" class="btn btn-info">
                    <i class="fas fa-plus"></i>
                    &nbsp;
                    Ajouter une table
                </a>
            </div>




            <br /><br />



            <div class="input-group" id="recherche">
                <span class="input-group-addon">
                    <i class="fas fa-search"></i>   
                </span>

                <input table="search" name="search" id="search" class="search form-control" placeholder="Rechercher...">
            </div>
        


            <hr />


            <div class="col-md-12 text-center table-responsive" id="elements">
                <table class="table table-hover text-center">
                    <tr class="bg-info">
                        <td>N°</td>
                        <td>TYPE DE TABLE</td>
                        <td>CODE</td>
                        <td>NB PLACES</td>
                        <td>PRIX</td>
                        <td>IMAGE</td>
                        <td>OPTIONS</td>
                    </tr>

<?php


if($tablerestaurants != null && sizeof($tablerestaurants) > 0) {

    $i= 0;
    foreach ($tablerestaurants as $tablerestaurant) {
        $i++;
        $update= 'app.php?view=tablerestaurant_update&idtablerestaurant='.$tablerestaurant->idtablerestaurant;
        $delete= 'controller/tablerestaurantController.php?action=delete&idtablerestaurant='.$tablerestaurant->idtablerestaurant;

        $typetable= $typetabledb->read($tablerestaurant->idtypetable);

        $image= $tablerestaurant->image;
        $link_image= 'controller/ressources/tablerestaurant/' . $image;

?>


                     

                    <tr class="element">
                        <td class="data"><?= $i ?></td>
                        <td class="data"><?= $typetable->intitule ?></td>
                        <td class="data"><?=$tablerestaurant->code ?></td>
                        <td class="data"><?=$tablerestaurant->nbplaces ?></td>
                        <td class="data"><?=$tablerestaurant->prix ?></td>

                        <td>
                            <?php if($image != null && $image != '') { ?>
                            <a href="<?= $link_image ?>" target="_blank">
                                <img src="<?= $link_image ?>" width="100px" />
                            </a>
                            <?php } ?>
                        </td>


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