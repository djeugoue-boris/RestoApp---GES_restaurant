<?php

$idtablerestaurant= $_REQUEST['idtablerestaurant'];
$tablerestaurant= $tablerestaurantdb->read($idtablerestaurant);
$typetable = $typetabledb->read($tablerestaurant->idtypetable);

$typetables = $typetabledb->readAll();

$image= $tablerestaurant->image;
$link_image= 'controller/ressources/tablerestaurant/' . $image;

?>


<section class="animate__animated animate__lightSpeedInRight">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <div class="text-right">
                <a href="app.php?view=table_create" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    &nbsp;
                    Liste des tables
                </a>
            </div>



            <br /><br />

            <div>
                <form name="form" method="POST" action="controller/tablerestaurantController.php?action=update" enctype="multipart/form-data" >
                    <fieldset>
                        <legend>
                            Modifier une table
                        </legend>

                        <div class="form-group">
                            <label for="idtablerestaurant">
                                ID TABLE RESTAURANT
                            </label>
                            <input type="text" name="idtablerestaurant" id="idtablerestaurant" class="form-control" required readonly value="<?= $tablerestaurant->idtablerestaurant ?>" />
                        </div>


                        <div class="form-group">
                            <label>
                                  Choisir le type de table
                            </label>

                            <select class="form-control" name="idtypetable">
                                <option value="<?= $typetable->idtypetable ?>" selected class="none">
                                    <?= $typetable->intitule ?>
                                </option>
                                
                            <?php
                            foreach($typetables as $typetable){
                            ?>
                                <option value="<?= $typetable->idtypetable ?>">
                                    <?= $typetable->intitule ?>
                                </option>
                            <?php 
                            }
                            ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="table">
                                Entrez le code
                            </label>
                            <input type="text" name="code" id="code" class="form-control" value="<?= $tablerestaurant->code ?>" />
                        </div>


                        <div class="form-group">
                            <label for="nbplaces">
                                Entrez le nombre de places
                            </label>
                            <input type="number" name="nbplaces" id="nbplaces" class="form-control" value="<?= $tablerestaurant->nbplaces ?>" />
                        </div>

                        <div class="form-group">
                            <label for="prix">
                                Entrez le prix
                            </label>
                            <input type="number" name="prix" id="prix" class="form-control" value="<?= $tablerestaurant->prix ?>" />
                        </div>


                        <div class="form-group">
                            <label for="image">
                                Entrez l'image
                            </label>


                            <?php if($image != null && $image != '') { ?>
                            <div class="text-center">
                                <a href="<?= $link_image ?>" target="_blank">
                                    <img src="<?= $link_image ?>" width="100px" />
                                </a>
                            </div>
                            <?php } ?>


                            <input type="file" name="image" id="image" class="form-control" accept=".png, .PNG, .jpg, .JPG, .jpeg, .JPEG, .gif, .GIF" data-browse-on-zone-click="true" />

                            <script type="text/javascript">
                                $('#image').fileinput({
                                    theme: 'fas',
                                    language: 'fr',
                                    showUpLoad: false,
                                    showCaption: true,
                                    showDownLoad: true,
                                    showZoom: true,
                                    showDrag: true,
                                    maxImageWidth: 10,
                                    maxImageHeight: 10,
                                    resizeImage: true,
                                    maxFileSize: 10240
                                });
                            </script>


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