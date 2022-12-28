<div class = "form">
            <h2><?=$titre?></h2>
            <form id="addVehiculeForm" action=<?php echo "index.php?action="; if (isset($vehicule)) echo "edit-vehicule"; else echo "add-vehicule"; ?> method="POST">
                
                <?php if(isset($vehicule)) echo "<input type=\"hidden\" name=\"idVehicule\" value=". $vehicule->getIdVehicule() .">";?>
                <label for="marque">Marque : </label>
                <input name="marque" type="text" required value=<?php if(isset($vehicule)) echo $vehicule->getMarque();?>> 
                <br>
                <label for="modele">Modele : </label>
                <input name="modele" type="text" required value=<?php if(isset($vehicule)) echo $vehicule->getModele();?>>
                <br>
                <label for="immatriculation">Immatriculation : </label>
                <input name="immatriculation" type="text" required value=<?php if(isset($vehicule)) echo $vehicule->getImmatriculation();?>>
                <br>
                <label for="site">Site : </label>
                <input name="site" type="text" required value=<?php if(isset($vehicule)) echo $vehicule->getSite();?>>
                <br>
                <label for="carburant">Carburant : </label>
                <input name="carburant" type="text" required value=<?php if(isset($vehicule)) echo $vehicule->getCarburant();?>>
                <br>
                <label for="miseenservice">Date de mise en service : </label>
                <input name="miseenservice" type="date" value=<?php if(isset($vehicule)) echo $vehicule->getMiseEnService();?>>
                <br>
                <label for="critair">Vignette Crit'Air :</label>
                <br>
                <select form="addVehiculeForm" id="critair" name="critair">
                    <option value="0"<?php if(isset($vehicule)) {if($vehicule->getCritair() == 0) echo "selected=\"selected\"";}?>>0 (Electrique)</option>
                    <option value="1"<?php if(isset($vehicule)) {if($vehicule->getCritair() == 1) echo "selected=\"selected\"";}?>>1</option>
                    <option value="2"<?php if(isset($vehicule)) {if($vehicule->getCritair() == 2) echo "selected=\"selected\"";}?>>2</option>
                    <option value="3"<?php if(isset($vehicule)) {if($vehicule->getCritair() == 3) echo "selected=\"selected\"";}?>>3</option>
                    <option value="4"<?php if(isset($vehicule)) {if($vehicule->getCritair() == 4) echo "selected=\"selected\"";}?>>4</option>
                    <option value="5"<?php if(isset($vehicule)) {if($vehicule->getCritair() == 5) echo "selected=\"selected\"";}?>>5</option>
                </select>
                <br>
                <label for="assurance">Assurance : </label>
                <input name="assurance" type="number" value=<?php if(isset($vehicule)) echo $vehicule->getAssurance();?>>
                <br>
                <label for="puissance">Puissance : </label>
                <input name="puissance" type="number" value=<?php if(isset($vehicule)) echo $vehicule->getPuissance();?>>
                <br>
                <label for="ageparc">Age du parc : </label>
                <input name="ageparc" type="number" value=<?php if(isset($vehicule)) echo $vehicule->getAgeParc();?>>
                <br>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=vehicule"> Retour </a>  