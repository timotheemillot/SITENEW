<div class = "form">
            <h2>Ajouter un véhicule</h2>
            <form action="index.php?action=add-vehicule" method="POST">
                
                <?php if(isset($infos)) echo "<input type=\"hidden\" name=\"id\" value=". $_GET['idVehicule'] .">";?>
                <label for="marque">Marque : </label>
                <input name="marque" type="text" required value=<?php if(isset($infos)) echo $infos["Marque"];?>> 
                <br>
                <label for="modele">Modele : </label>
                <input name="modele" type="text" required value=<?php if(isset($infos)) echo $infos["Modele"];?>>
                <br>
                <label for="immatriculation">Immatriculation : </label>
                <input name="immatriculation" type="text" required value=<?php if(isset($infos)) echo $infos["Immatriculation"];?>>
                <br>
                <label for="site">Site : </label>
                <input name="site" type="text" required value=<?php if(isset($infos)) echo $infos["Site"];?>>
                <br>
                <label for="carburant">Carburant : </label>
                <input name="carburant" type="text" required value=<?php if(isset($infos)) echo $infos["Carburant"];?>>
                <br>
                <label for="miseenservice">Date de mise en service : </label>
                <input name="miseenservice" type="date" value=<?php if(isset($infos)) echo $infos["MiseEnService"];?>>
                <br>
                <label for="critair">Vignette critair : </label>
                <input name="critair" type="text" value=<?php if(isset($infos)) echo $infos["Critair"];?>>
                <br>
                <label for="assurance">Assurance : </label>
                <input name="assurance" type="number" value=<?php if(isset($infos)) echo $infos["Assurance"];?>>
                <br>
                <label for="puissance">Puissance : </label>
                <input name="puissance" type="number" value=<?php if(isset($infos)) echo $infos["Puissance"];?>>
                <br>
                <label for="ageparc">Age du parc : </label>
                <input name="ageparc" type="number" value=<?php if(isset($infos)) echo $infos["AgeParc"];?>>
                <br>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=vehicule"> Retour </a>  