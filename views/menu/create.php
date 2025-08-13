<?php

$typemenus = $typemenudb->readAll();

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
    			<form name="form" method="POST" action="controller/menuController.php?action=create" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Ajouter un menu
    					</legend>


                        <div class="form-group">
                            <label>
                                  Choisir le type de menu
                            </label>

                            <select class="form-control" name="idtypemenu">
                                
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
    						<input type="text" name="intitule" id="intitule" class="form-control" />
    					</div>


    					<div class="form-group">
    						<label for="prix">
                                    Entrez le prix
                            </label>
                            <input type="number" name="prix" id="prix" class="form-control" />
                        </div>


                        <div class="form-group">
                            <label for="image">
                                Entrez l'image
                            </label>

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
    						<input type="submit" name="enregistrer" value="Enregistrer" class="btn btn-success">
    					</div>
    				</fieldset>
    			</form>
    		</div>

	      
        </div>
    </div>
</section>