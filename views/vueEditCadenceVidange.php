<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=edit-cadence-vidange&idVehicule=<?=$idVehicule?>" method="POST">
                
                <input type="hidden" name="idVehicule" value=<?=$idVehicule?>>
                <label for="cadenceVidange">Cadence des vidanges : </label>
                <input name="cadenceVidange" type="number" value=<?=$cadenceVidange?> required> 
                <br>
                <input class="button" name="submit" type="submit" value="Valider">              
            </form>
            
        </div>
        <div id = "popup"></div>
<a id="retour" href="index.php?action=detail"> Retour </a>