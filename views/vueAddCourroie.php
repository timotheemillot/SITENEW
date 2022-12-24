<div class = "form">
            <h2><?=$titre?></h2>
            <form action="index.php?action=add-courroie&idVehicule=<?=$idVehicule?>" method="POST">
                
                <input type="hidden" name="idVehicule" value=<?=$idVehicule?>>
                <label for="dateChangementCourroie">Date du changement de la courroie</label>
                <input type="date" name="dateChangementCourroie" required>
                <br>
                <label for="kmDerniereCourroie">Kilometres parcourus depuis le dernier changement de courroie : </label>
                <input name="kmDerniereCourroie" type="number" required>
                <br>
                <input class="button" name="submit" type="submit" value="Valider">
                
            </form>
            
        </div>
        <div id = "popup"></div>
        
    
    
    


    <a id="retour" href="index.php?action=vehicule"> Retour </a>