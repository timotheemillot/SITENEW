


<table id="listcar">
<tr id="lignehead">
    <th>Cadence des vidanges</th>
    <th>Vidange à faire ?</th>
    <th>Date Vidange</th>
    <th>Km parcourus depuis la derniere vidange</th>
    <th>Options</th>
</tr>
<?php

$allVidange = $vehicule->getVidange();

if ($allVidange != false) {


    if ($vehicule->getCadenceVidange() < $allVidange[0]->getKmDerniereVidange())
    {
        $vidangeafaire = "Oui";
    }
    else
    {
        $vidangeafaire = "Non";
    }

    echo "<tr>
        <td>" . $vehicule->getCadenceVidange() . "</td>
        <td> " . $vidangeafaire . "</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>";

    foreach ($allVidange as $vidange) {


        echo "
        <tr>
            <td></td>
            <td></td>
            <td>" . $vidange->getDateVidange() . "</td>
            <td>" . $vidange->getKmDerniereVidange() . "</td>
            <td> <a href=\"#\"><img class=\"imgOutils\" src=\"public/img/edit2.png\"></a><a href=\"index.php?action=del-vidange&idVidange=" . $vidange->getIdVidange() . "&idVehicule=" . $vehicule->getIdVehicule() . "\"><img class=\"imgOutils\" src=\"public/img/delete.png\"></a></td>;
        </tr>";
    }
}
?>

</table>
<table class="multipleButtonTable">
    <tr>
        <td>
            <div class="bout">
                <a href="index.php?action=add-vidange&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter une vidange</a>
            </div>
        </td>

        <td>
            <div class="bout">
                <a href="index.php?action=edit-cadence-vidange&idVehicule=<?=$vehicule->getIdVehicule()?>">Modifier la cadence</a>
            </div>
        </td>
    <tr>
</table>

<table id="listcar">
<tr id="lignehead">
    <th>Cadence du changement de courroie</th>
    <th>Courroie à remplacer ?</th>
    <th>Date changement de courroie</th>
    <th>Km parcourus depuis le dernier changement de courroie</th>
    <th>Options</th>
</tr>
<?php

$allCourroie = $vehicule->getCourroie();

if ($allCourroie != false) {


    if ($vehicule->getCadenceCourroie() < $allCourroie[0]->getKmDerniereCourroie())
    {
        $courroieARemplacer = "Oui";
    }
    else
    {
        $courroieARemplacer = "Non";
    }

    echo "<tr>
        <td>" . $vehicule->getCadenceCourroie() . "</td>
        <td> " . $courroieARemplacer . "</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>";

    foreach ($allCourroie as $courroie) {


        echo "
        <tr>
            <td></td>
            <td></td>
            <td>" . $courroie->getDateChangementCourroie() . "</td>
            <td>" . $courroie->getKmDerniereCourroie() . "</td>
            <td> <a href=\"#\"><img class=\"imgOutils\" src=\"public/img/edit2.png\"></a><a href=\"index.php?action=del-courroie&idCourroie=" . $courroie->getIdCourroie() . "&idVehicule=" . $vehicule->getIdVehicule() . "\"><img class=\"imgOutils\" src=\"public/img/delete.png\"></a></td>;
        </tr>";
    }
}

?>

</table>
<table class="multipleButtonTable">
    <tr>
        <td>
            <div class="bout">
                <a href="index.php?action=add-courroie&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter une donnée courroie</a>
            </div>
        </td>

        <td>
            <div class="bout">
                <a href="index.php?action=edit-cadence-courroie&idVehicule=<?=$vehicule->getIdVehicule()?>">Modifier la cadence</a>
            </div>
        </td>
    <tr>
</table>

<table id="listcar">
<tr id="lignehead">
    <th>Date controle technique</th>
    <th>Complementaire</th>
    <th>date du prochain contrôle technique</th>
    <th>Options</th>
</tr>

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
            <td> <a href=\"#\"><img class=\"imgOutils\" src=\"public/img/edit2.png\"></a><a href=\"index.php?action=del-ct&idCt=" . $Ct->getIdCt() . "&idVehicule=" . $vehicule->getIdVehicule() . "\"><img class=\"imgOutils\" src=\"public/img/delete.png\"></a></td>;
        </tr>";
}

?>

</table>
<table class="multipleButtonTable">
    <td>
        <div class="bout">
            <a href="index.php?action=add-ct&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter un contrôle technique</a>
        </div>
    </td>
</table>

<table id="listcar">
<tr id="lignehead">
    <th>Date</th>
    <th>Cout</th>
    <th>Kilometre</th>
    <th>Description</th>
    <th>Options</th>
</tr>

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
            <td> <a href=\"#\"><img class=\"imgOutils\" src=\"public/img/edit2.png\"></a><a href=\"index.php?action=del-intervention&idIntervention=" . $intervention->getIdIntervention() . "&idVehicule=" . $vehicule->getIdVehicule() . "\"><img class=\"imgOutils\" src=\"public/img/delete.png\"></a></td>;
        </tr>";
}

?>



</table>
<table class="multipleButtonTable">
    <td>
        <div class="bout">
            <a href="index.php?action=add-intervention&idVehicule=<?=$vehicule->getIdVehicule()?>">Ajouter une intervention</a>
        </div>
    </td>
</table>