<?php

$idmenu= $_REQUEST['idmenu'];
$menu= $menudb->read($idmenu);
$typemenu = $typemenudb->read($menu->idtypemenu);

$typemenus = $typemenudb->readAll();

$image= $menu->image;
$link_image= 'controller/ressources/menu/' . $image;

?>

<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		<div class="text-right">
	    		<a href="app.php?view=menu" class="btn btn-info">
		            <i class="fas fa-book"></i>
		            &nbsp;
		            Liste des menus
	        	</a>
    		</div>



    		<br /><br />

    		<div>
    			<form name="form" method="POST" action="controller/menuController.php?action=update" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Modifier un menu
    					</legend>

    					<div class="form-group">
                            <label for="idmenu">
                                ID MENU
                            </label>
                            <input type="text" name="idmenu" id="idmenu" class="form-control" required readonly value="<?= $menu->idmenu ?>" />
                        </div>


                        <div class="form-group">
                            <label>
                                  Choisir le type de menu
                            </label>

                            <select class="form-control" name="idtypemenu">
                                <option value="<?= $typemenu->idtypemenu ?>" selected class="none">
                                    <?= $typemenu->intitule ?>
                                </option>

                            <?php
                            foreach($typemenus as $typemenu){
                            ?>
                                <option value="<?= $typemenu->idtypemenu ?>">
                                    <?= $typemenu->intitule ?>
                                </option>
                            <?php 
                            }
                            ?>

                            </select>
                        </div>


    					<div class="form-group">
    						<label for="intitule">
    							Entrez l'intitule
    						</label>
    						<input type="text" name="intitule" id="intitule" class="form-control" value="<?= $menu->intitule ?>" />
    					</div>


    					<div class="form-group">
    						<label for="prix">
                                    Entrez le prix
                            </label>
                            <input type="number" name="prix" id="prix" class="form-control" value="<?= $menu->prix ?>" />
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