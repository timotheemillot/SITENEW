<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=add-ct&idVehicule=<?=$idVehicule?>" method="POST" id="ctform">
                
                <input type="hidden" name="idVehicule" value=<?=$idVehicule?>>
                <label for="dateDernierCt">Date du dernier contrôle technique</label>
                <input name="dateDernierCt" type="date" required value=<?php if(isset($ct)) echo $vehicule->getMarque();?>> 
                <br>
                <label for="complementaireCt">Contrôle technique complemenataire ?</label>
                <select name="complementaireCt" id="complementaireCt" form="ctform">
                    <option value="1">Oui</option>
                    <option value="0" selected>Non</option>
                </select>
                <br>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=detail"> Retour </a>