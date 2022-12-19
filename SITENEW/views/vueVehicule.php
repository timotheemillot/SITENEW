
<div id="divListCar">
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
            <th>Details</th>
            <th>Outils</th>
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
                <td>" . $vehicule->getAgeParc() . "</td>
                <td> <a href=\"index.php?action=get-detail&idVehicule=" . $vehicule->getIdVehicule() . "\">Details</a>
                <td> <a href=\"index.php?action=edit-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\">Edit  ||  </a><a href=\"index.php?action=del-vehicule&idVehicule=" . $vehicule->getIdVehicule() . "\">Del</a></td>
            <tr>";
        }
    ?>

            

                    

    </table>    
        
        <div class="bout"> 
        <a href="index.php?action=add-vehicule">Ajouter un véhicule</a>
        <div>
    <p id="popup"><?= $popup; ?></p>       
</div>
