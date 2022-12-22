
<table>

<th>Cadence des vidanges</th>
<th>Km parcourus depuis la derniere vidange</th>
<th>Vidange à faire ?</th>
<th>Options</th>

<?php

$allVidange = $vehicule->getVidange();


foreach($allVidange as $vidange)
{
    if ($vidange->getVidangeAFaire() == 1)
        $vidangeafaire = "Oui";
    else
        $vidangeafaire = "Non";

    echo "
        <tr>
            <td>" . $vidange->getCadenceVidange() . "</td>
            <td>" . $vidange->getKmDerniereVidange() . "</td>
            <td>" . $vidangeafaire. "</td>
            <td> <a href=\"#\">Edit  ||  </a><a href=\"index.php?action=del-vidange&idVidange=" . $vidange->getIdVidange() . "&idVehicule=" . $vehicule->getIdVehicule() . "\">Del</a></td>;
        </tr>";
}

?>

</table>
<a href="index.php?action=add-vidange&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter une vidange</a>

<table>

<th>Cadence du changement de courroie</th>
<th>Km parcourus depuis le dernier changement</th>
<th>Courroie à remplacer ?</th>
<th>Options</th>

<?php

$allCourroie = $vehicule->getCourroie();

foreach($allCourroie as $courroie)
{
    if ($courroie->getCourroieARemplacer() == 1)
        $courroieARemplacer = "Oui";
    else
        $courroieARemplacer = "Non";
    echo "
        <tr>
            <td>" . $courroie->getCadenceCourroie() . "</td>
            <td>" . $courroie->getKmDerniereCourroie() . "</td>
            <td>" . $courroieARemplacer . "</td>
            <td> <a href=\"#\">Edit  ||  </a><a href=\"index.php?action=del-courroie&idCourroie=" . $courroie->getIdCourroie() . "&idVehicule=" . $vehicule->getIdVehicule() . "\">Del</a></td>;
        </tr>";
}

?>

</table>
<a href="index.php?action=add-courroie&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter une donnée courroie</a>

<table>

<th>Date du dernier controle technique</th>
<th>Complementaire</th>
<th>date du prochain contrôle technique</th>
<th>Options</th>


<?php

$allCt = $vehicule->getCt();


foreach($allCt as $Ct)
{
    if ($Ct->getComplementaireCt() == 1)
    $complementaireCt = "Oui";
    else
    $complementaireCt = "Non";
    echo "
        <tr>
            <td>" . $Ct->getDateDernierCt() . "</td>
            <td>" . $complementaireCt . "</td>
            <td>" . $Ct->getDateProchainCt() . "</td>
            <td> <a href=\"#\">Edit  ||  </a><a href=\"index.php?action=del-ct&idCt=" . $Ct->getIdCt() . "&idVehicule=" . $vehicule->getIdVehicule() . "\">Del</a></td>;
        </tr>";
}

?>

</table>
<a href="index.php?action=add-ct&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter un contrôle technique</a>

<table>

<th>Date</th>
<th>Cout</th>
<th>Kilometre</th>
<th>Description</th>
<th>Options</th>


<?php

$allIntervention = $vehicule->getIntervention();

foreach($allIntervention as $intervention)
{
    echo "
        <tr>
            <td>" . $intervention->getDate() . "</td>
            <td>" . $intervention->getCout() . "</td>
            <td>" . $intervention->getKilometre() . "</td>
            <td>" . $intervention->getDescription() . "</td>
            <td> <a href=\"#\">Edit  ||  </a><a href=\"index.php?action=del-intervention&idIntervention=" . $intervention->getIdIntervention() . "&idVehicule=" . $vehicule->getIdVehicule() . "\">Del</a></td>;
        </tr>";
}

?>



</table>
<a href="index.php?action=add-intervention&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter une intervention</a>