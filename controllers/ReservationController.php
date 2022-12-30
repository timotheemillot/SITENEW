<?php


require_once("views/View.php");
require_once("models/ReservationManager.php");
require_once("controllers/MainController.php");
require_once("models/Reservation.php");
require_once("models/ReservationManager.php");


class ReservationController{

    function displayAddReservation(?string $error = null) : void
    {

        if(isset($_POST['submit']))
        {
            $cm = new CompteManager();
            $identifiantCompte = $_COOKIE['compte'];
            $compte = new Compte();
            $compte = $cm->selectByIdentifiant($identifiantCompte);


            $reservationData = array(
                "Nom" => $compte->getNom(),
                "Date" => $_POST['date'],
                "véhicule" => $_POST['vehicule'],
                "Nombre_covoit" => $_POST['numbe']
            ); 
            $reservation = new Reservation();
            $reservation->hydrate($reservationData);
            $popup = $this->addVehicule($reservation);
            $mc = new MainController();
            $mc->displayReservation($popup);

        }
        else
        {
            $indexView = new View('Reservation');
            $indexView->generer([]);
        }
        

                       
    }

    function addVehicule(Reservation $reservation) : string
    {
        $rm = new ReservationManager();
        $reservations = $rm->createReservation($reservation);
        if (isset($reservations) && $reservations->getVéhicule() != "")
            $popup = "Reussite : réservation crée";
        else
            $popup = "Erreur : réservation non crée";
        
       return $popup;
    }


    function deleteReservation($idReservation)
    {
        $rm = new ReservationManager();
        $rm->deleteReservation($idReservation);
        $reservation = $rm->getById($idReservation);
        if(isset($vehicule))
        {
            $message = "Erreur lors de la suppresion";
        }
        else
        {
            $message = "reservation supprimé";
        }

        $indexView = new View('HistoriqueReservation');
        $indexView->generer([
            'popup' => $message,
            'allreservation' => $rm->getAll()
        ]);
    }

    function NextYear(?string $error = null) {
        $indexView = new View('Reservation');
        $vm = new VehiculeManager();
        $allVehicule = $vm->getAll();

        $cm = new CompteManager();
        $identifiantCompte = $_COOKIE['compte'];
        $compte = new Compte();
        $compte = $cm->selectByIdentifiant($identifiantCompte);

        $yearN = Date('Y') + 1;
        $indexView->generer(['allVehicule' => $allVehicule,
                            'year' => $yearN,
                            'popup' => $error,
                            'admin' => $compte->getIsAdmin()]);
    }




    public function displayHistReservation(?string $error = null){
        $indexView = new View('HistoriqueReservation');
        $rm = new ReservationManager();
        $allreservation = $rm->getAll();
        $indexView->generer(['allreservation' => $allreservation,
                              'popup' => $error]);
    }

}

?>