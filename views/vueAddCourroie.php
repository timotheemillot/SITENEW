<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=add-courroie&idVehicule=<?=$idVehicule?>" method="POST">
                
                <input type="hidden" name="idVehicule" value=<?=$idVehicule?>>
                <label for="cadenceCourroie">Cadence de la courroie : </label>
                <input name="cadenceCourroie" type="number" required value=<?php if(isset($courroie)) echo $vehicule->getMarque();?>> 
                <br>
                <label for="kmDerniereCourroie">Kilometres parcourus depuis le dernier changement de courroie : </label>
                <input name="kmDerniereCourroie" type="number" required value=<?php if(isset($courroie)) echo $vehicule->getModele();?>>
                <br>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=vehicule"> Retour </a>