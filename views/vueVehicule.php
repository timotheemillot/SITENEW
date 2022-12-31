
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
            <!--<th>Age Parc</th>-->

    
    <?php      
            //si le compte est admin on affiche les options en plus  
            if ($compte->getIsAdmin() == 1) 
                echo"<th>Disponible ?</th>
                <th>Details</th>
                <th>Outils</th>";
    ?>
        </tr>

    <?php
        foreach ($allVehicule as $vehicule) 
        {
        if (($vehicule->getDisponible() == 1 && $compte->getIsAdmin() == 0) || $compte->getIsAdmin() == 1) 
        {
            echo "<tr>
                <td>" . $vehicule->getMarque() . "</td>
                <td>" . $vehicule->getModele() . "</td>
                <td>" . $vehicule->getImmatriculation() . "</td>
                <td>" . $vehicule->getSite() . "</td>
                <td>" . $vehicule->getCarburant() . "</td>
                <td>" . $vehicule->getMiseEnService() . "</td>
                <td>" . $vehicule->getCritair() . "</td>
                <td>" . $vehicule->getAssurance() . "</td>
                <td>" . $vehicule->getPuissance() . "</td>";
            //<td>" . $vehicule->getAgeParc() . "</td>";
        }
            if ($compte->getIsAdmin() == 1)// si le compte est admin on affiche les options en plus
            {
                if ($vehicule->getDisponible() == 1)
                    echo "<td> Disponible </td>";
                else
                    echo "<td>Indisponible</td>";

                echo "<td> <a href=\"index.php?action=detail-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\">Details</a>
                <td> <a href=\"index.php?action=edit-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\"><img class=\"imgOutils\" src=\"../public/img/edit2.png\"></a><a href=\"index.php?action=del-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\"><img class=\"imgOutils\" src=\"../public/img/delete.png\"></a></td>";
            }
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
