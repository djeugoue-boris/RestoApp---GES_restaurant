<?php

$typemenus= $typemenudb->readAll();

?>


<section>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <h3>
                Liste des types de menus
            </h3>
            <hr />



            <div class="text-right">
                <a href="app.php?view=typemenu_create" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    &nbsp;
                    Ajouter un type de menu
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
                        <td>INTITULE</td>
                        <td>OPTIONS</td>   
                    </tr>

<?php

if($typemenus != null && sizeof($typemenus) > 0) {
    $i= 0;
    foreach ($typemenus as $typemenu) {     
        $i++;
       
         $update= 'app.php?view=typemenu_update&idtypemenu='.$typemenu->idtypemenu;
         $delete= 'controller/typemenuController.php?action=delete&idtypemenu='.$typemenu->idtypemenu;

?>

                    <tr class="element">
                        <td class="data"><?= $i ?></td>
                        <td class="data"><?= $typemenu->intitule ?></td>
                       
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
