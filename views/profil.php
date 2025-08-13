
<section class="animate__animated animate__lightSpeedInRight">
	<div class="row">
    	<div class="col-md-offset-2 col-md-8 col-md-offset-2">
    		

    		<div>
    			<form name="form" method="POST" action="#" enctype="multipart/form-data" >
    				<fieldset>
    					<legend>
    						Modifier mon profil
    					</legend>

                        <div class="form-group">
                            <label for="idadmin">
                                ID PROFIL
                            </label>
                            <input type="text" name="idadmin" id="idadmin" class="form-control" required readonly />
                        </div>

                        <div class="form-group">
                            <label for="photo">
                                Modifier la photo de profil
                            </label>
                            <input type="file" name="photo" id="photo" class="form-control" accept=".png, .PNG, .jpg, .JPG, .jpeg, .JPEG, .gif, .GIF" data-browse-on-zone-click="true" />

                            <script type="text/javascript">
                                $('#photo').fileinput({
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

    					<div class="form-group">
    						<label for="nom">
    							Entrez le nom
    						</label>
    						<input type="text" name="nom" id="nom" class="form-control" />
    					</div>

    					<div class="form-group">
    						<label for="login">
    							Entrez le nom d'utilisateur
    						</label>
    						<input type="text" name="login" id="login" class="form-control" required />
    					</div>

    					<div class="form-group">
    						<label for="password">
    							Entrez le mot de passe
    						</label>
    						<input type="password" name="password" id="password" class="form-control" />
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