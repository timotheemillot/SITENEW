<?php

require_once('controllers/MainController.php');
require_once('controllers/CompteController.php');
require_once('controllers/VehiculeController.php');
require_once('controllers/StatsController.php');

$mainController = new MainController();
$VehiculeController = new VehiculeController();
$compteController = new CompteController();
$statsController = new StatsController();
$reservationController = new ReservationController();

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
            case "del-vidange":
                $VehiculeController->deleteVidange($_GET['idVidange'], $_GET['idVehicule']);
                break;
            case "add-courroie":
                $VehiculeController->displayAddCourroie($_GET['idVehicule']);
                break;
            case "edit-cadence-vidange":
                $VehiculeController->displayEditCadenceVidange($_GET['idVehicule']);
                break;
            case "del-courroie":
                $VehiculeController->deleteCourroie($_GET['idCourroie'], $_GET['idVehicule']);
                break;
            case "edit-cadence-courroie":
                $VehiculeController->displayEditCadenceCourroie($_GET['idVehicule']);
                break;
            case "add-ct":
                $VehiculeController->displayAddCt($_GET['idVehicule']);
                break;
            case "del-ct":
                $VehiculeController->deleteCt($_GET['idCt'], $_GET['idVehicule']);
                break;
            case "add-intervention":
                $VehiculeController->displayAddIntervention($_GET['idVehicule']);
                break;
            case "del-intervention":
                $VehiculeController->deleteIntervention($_GET['idIntervention'], $_GET['idVehicule']);
                break;
            case "compte":
                $compteController->displayCompte();
                break;
            case "reservation":
                break;
            case "statistique":
                $statsController->displayStatistique();
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
            case "Reservation":
                    $mainController->displayReservation();
                    break;
            case "add-reservation":
                    $reservationController->displayAddReservation();
                    break;
            case "HistRes":
                        $reservationController->displayHistReservation();
                    break;
            case "del-reservation":
                        $reservationController->deleteReservation($_GET['idReservation']);
                    break;
            case "next-year":
                        $reservationController->NextYear($_GET['year']);
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
