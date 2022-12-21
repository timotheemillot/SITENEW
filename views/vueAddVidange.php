<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=add-vidange&idVehicule=<?=$idVehicule?>" method="POST">
                
                <?php if(isset($vidange)) echo "<input type=\"hidden\" name=\"idVehicule\" value=". $vehicule->getIdVehicule() .">";?>
                <label for="cadenceVidange">Cadence de la vidange : </label>
                <input name="cadenceVidange" type="number" required value=<?php if(isset($vidange)) echo $vehicule->getMarque();?>> 
                <br>
                <label for="kmDerniereVidange">Kilometres parcourus depuis la derniere vidange : </label>
                <input name="kmDerniereVidange" type="number" required value=<?php if(isset($vidange)) echo $vehicule->getModele();?>>
                <br>
                <input type="hidden" name="idVehicule" value="">
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=vehicule"> Retour </a>