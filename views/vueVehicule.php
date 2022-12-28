
<div id="divListCar">
<p id="popup"><?= $popup; ?></p> 
<br>
    <table id="listcar">
        <tr id="lignehead">
            <th>Marque</th>
            <th>Modele</th>
            <th>Immatriculation</th>
            <th>Site</th>
            <th>Carburant</th>
            <th>Date mise en service</th>
            <th>Vignette Critair</th>
            <th>Assurance</th>
            <th>Puissance</th>
            <th>Age Parc</th>
    
    <?php      
            //si le compte est admin on affiche les options en plus  
            if ($compte->getIsAdmin() == 1) 
                echo"<th>Details</th>
                        <th>Outils</th>";
    ?>
        </tr>

    <?php
        foreach ($allVehicule as $vehicule) 
        {
            echo"<tr>
                <td>" . $vehicule->getMarque() . "</td>
                <td>" . $vehicule->getModele() . "</td>
                <td>" . $vehicule->getImmatriculation() . "</td>
                <td>" . $vehicule->getSite() . "</td>
                <td>" . $vehicule->getCarburant() . "</td>
                <td>" . $vehicule->getMiseEnService() . "</td>
                <td>" . $vehicule->getCritair() . "</td>
                <td>" . $vehicule->getAssurance() . "</td>
                <td>" . $vehicule->getPuissance() . "</td>
                <td>" . $vehicule->getAgeParc() . "</td>";
                if ($compte->getIsAdmin() == 1) // si le compte est admin on affiche les options en plus
                echo "<td> <a href=\"index.php?action=detail-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\">Details</a>
                <td> <a href=\"index.php?action=edit-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\">Edit  ||  </a><a href=\"index.php?action=del-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\">Del</a></td>";
            echo "</tr>";
        }
    ?>

            

                    

    </table>    
        
    <?php
        //si le compte est admin on propose d'ajouter un véhicule
        if($compte->getIsAdmin() == 1)
        echo"<div class=\"bout\"> 
        <a href=\"index.php?action=add-vehicule\">Ajouter un véhicule</a>
        <div>"
    ?>
          
</div>
