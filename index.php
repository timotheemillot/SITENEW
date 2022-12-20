<?php

require_once('controllers/MainController.php');
require_once('controllers/CompteController.php');
require_once('controllers/AddVehiculeController.php');

$mainController = new MainController();
$addVehiculeController = new AddVehiculeController();
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
                $addVehiculeController->displayAddVehicule();
                break;
            case "edit-vehicule":
                $addVehiculeController->displayEditVehicule($_GET['idVehicule']);
                break;
            case "del-vehicule":
                $addVehiculeController->deleteVehicule($_GET['idVehicule']);
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

?>
