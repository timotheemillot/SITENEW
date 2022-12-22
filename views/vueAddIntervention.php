<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=add-intervention&idVehicule=<?=$idVehicule?>" method="POST">
                
                <input type="hidden" name="idVehicule" value=<?=$idVehicule?>>
                <label for="date">Date : </label>
                <input name="date" type="date" required value=<?php if(isset($vidange)) echo $vehicule->getMarque();?>> 
                <br>
                <label for="cout">Cout :</label>
                <input name="cout" type="number" required value=<?php if(isset($vidange)) echo $vehicule->getModele();?>>
                <br>
                <label for="kilometre">Kilometre :</label>
                <input name="kilometre" type="number" required value=<?php if(isset($vidange)) echo $vehicule->getModele();?>>
                <br>
                <label for="description">Description :</label>
                <input name="description" type="text" required>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=vehicule"> Retour </a>