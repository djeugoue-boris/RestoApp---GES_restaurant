<?php

$menus= $menudb->readAll();

?>


<section>
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <h3>
                Liste des menus
            </h3>
            <hr />


            <div class="text-right">
                <a href="app.php?view=menu_create" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    &nbsp;
                    Ajouter un menu
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
                        <td>TYPE DE MENU</td>
                        <td>INTITULE</td>
                        <td>PRIX</td>
                        <td>IMAGE</td>
                        <td>OPTIONS</td>
                    </tr>

<?php

if($menus != null && sizeof($menus) > 0) {

    $i= 0;
    foreach ($menus as $menu) {     
        $i++;
        $update= 'app.php?view=menu_update&idmenu='.$menu->idmenu;
        $delete= 'controller/menuController.php?action=delete&idmenu='.$menu->idmenu;

        $typemenu= $typemenudb->read($menu->idtypemenu);

        $image= $menu->image;
        $link_image= 'controller/ressources/menu/' . $image;

?>
                    <tr class="element">
                        <td class="data"><?= $i ?></td>
                        <td class="data"><?= $typemenu->intitule ?></td>
                        <td class="data"><?= $menu->intitule ?></td>
                        <td class="data"><?= $menu->prix ?></td>


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