<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=add-vidange&idVehicule=<?=$idVehicule?>" method="POST">
                
                <input type="hidden" name="idVehicule" value=<?=$idVehicule?>>
                <label for="dateVidange">Date de la vidange : </label>
                <input name="dateVidange" type="date" required> 
                <br>
                <label for="kmDerniereVidange">Kilometres parcourus depuis la derniere vidange : </label>
                <input name="kmDerniereVidange" type="number" required>
                <br>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
    <a id="retour" href="index.php?action=vehicule"> Retour </a>