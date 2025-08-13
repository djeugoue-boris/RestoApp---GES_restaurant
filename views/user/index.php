<?php 

$users = $userdb->readAll();

?>



<section>
	<div class="row">
    	<div class="col-md-offset-1 col-md-10 col-md-offset-1">
    		<h3>
                Liste des utilisateurs
            </h3>
            <hr />



    		<div class="text-right">
	    		<a href="app.php?view=user_create" class="btn btn-info">
		            <i class="fas fa-plus fa-spin fa-fw"></i>
		            &nbsp;
		            Ajouter un utilisateur
	        	</a>
    		</div>




    		<br /><br />



	    	<div class="input-group">
	    		<span class="input-group-addon">
	    			<i class="fas fa-search"></i>	
	    		</span>

	    		<input type="search" name="search" class="search form-control" placeholder="Rechercher...">
	    	</div>
    	

    		<hr />


	    	<div class="col-md-12 text-center table-responsive" id="element">
		        <table class="table table-hover text-center">
		            <tr class="bg-info">
		                <td>N°</td>
		                <td>NOM</td>
		                <td>PRENOM</td>
		                <td>TELEHONE</td>
		                <td>EMAIL</td>
		                <td>PASSWORD</td>
		                <td>ROLE</td>
		                <td>OPTIONS</td>
		            </tr>

		            
		            <?php 
		            	if($users != null && sizeof($users)>0){
		            		$i=0;
		            		foreach ($users as $user) {
		            			$i++;
		            			$update='app.php?view=user_update&iduser='.$user->iduser;
		            			$delete='controller/userController.php?action=delete&iduser='.$user->iduser;

		            ?>

		            <tr class="element">
		                <td class="data"><?=$i ?></td>
		                <td class="data"><?=$user->nom ?></td>
		                <td class="data"><?=$user->prenom ?></td>
		                <td class="data"><?=$user->telephone ?></td>
		                <td class="data"><?=$user->email ?></td>
		                <td class="data"><?=$user->password ?></td>
		                <td class="data"><?=$user->role ?></td>


		                <td>
		                    <a href="<?=$update?>" class="btn btn-info">
		                        <i class="fas fa-pencil-alt"></i>
		                    </a>
		                    <a href="<?=$delete?>" class="btn btn-danger">
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