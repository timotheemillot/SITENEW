<?php

require_once('controllers/MainController.php');
require_once('controllers/CompteController.php');
require_once('controllers/AddVehiculeController.php');

$mainController = new MainController();
$addVehiculeController = new AddVehiculeController();
$compteController = new CompteController();


if (!(isset($_COOKIE['compte'])) && !($_GET['action'] == "inscription"))
{
    $compteController->displayConnexion();
}
else {
    if (isset($_GET)) {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case "connexion":
                    $compteController->displayConnexion();
                    break;
                case "inscription":
                    $compteController->displayInscription();
                    break;
                case "deconnexion":
                    $compteController->deconnexion();
                    break;
                case "vehicule":
                    $mainController->displayVehicule();
                    break;
                case "add-vehicule":
                    $addVehiculeController->displayAddVehicule();
                    break;
                case "compte":
                    $compteController->displayCompte();
                    break;
                case "reservation":
                    break;
                case "statistique":
                    break;
                case "nous-contacter":
                    break;
                case "airpur":
                    break;
                default:
                    $mainController->Index();
                    break;
            }
        } else
            $mainController->Index();

    } else
        $mainController->Index();
}
?>
