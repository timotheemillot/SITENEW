<?php

require_once('controllers/MainController.php');
require_once('controllers/CompteController.php');
require_once('controllers/VehiculeController.php');

$mainController = new MainController();
$VehiculeController = new VehiculeController();
$compteController = new CompteController();

if (!isset($_COOKIE['compte']) && isset($_GET['action']))
{
    if($_GET['action'] == "inscription")
    {

    }
    else
    {
        $_GET['action'] = "connexion";
    }
}
else if (!isset($_COOKIE['compte']))
{
    $_GET['action'] = "connexion";
}



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
                $VehiculeController->displayAddVehicule();
                break;
            case "edit-vehicule":
                $VehiculeController->displayEditVehicule($_GET['idVehicule']);
                break;
            case "del-vehicule":
                $VehiculeController->deleteVehicule($_GET['idVehicule']);
                break;
            case "detail-vehicule":
                $VehiculeController->displayDetail($_GET['idVehicule']);
                break;
            case "add-vidange":
                $VehiculeController->displayAddVidange($_GET['idVehicule']);
                break;
            case "add-courroie":
                $VehiculeController->displayAddCourroie($_GET['idVehicule']);
                break;
            case "compte":
                $compteController->displayCompte();
                break;
            case "reservation":
                break;
            case "statistique":
                break;
            case "contact":
                $mainController->displayContact();
                break;
            case "policonf":
                $mainController->displayPoliconf();
                break;
            case "presentation":
                $mainController->displayPresentation();
                break;
            default:
                $mainController->Index();
                break;
        }
    } else
        $mainController->Index();

} else
    $mainController->Index();

?>
