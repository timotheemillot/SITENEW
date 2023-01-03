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
                "Durée" => $_POST['duree'],
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
            $message = "Erreur lors de la suppression";
        }
        else
        {
            $message = "reservation supprimé";
        }
                
        $year = Date('Y');
        $month = Date('m');
        $day = Date('d');
        $date = $year . "-" . $month . "-" . $day;


        $indexView = new View('HistoriqueReservation');
        $indexView->generer([
            'popup' => $message,
            'allreservation' => $rm->getAll(),
            'date' => $date,
            'filtre' =>"Filtrer"
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

                
        $year = Date('Y');
        $month = Date('m');
        $day = Date('d');
        $date = $year . "-" . $month . "-" . $day;


        $indexView->generer(['allreservation' => $allreservation,
                              'popup' => $error,
                              'date' => $date,
                              'filtre' => "Filtrer"]);
    }



    public function displaySearch() : void
    {
        // si l'on clique sur le bouton recheche
        if(isset($_POST['submit']))
        {   
            
                //si le champ type de recherche n'est pas null
                if ($_POST['champ'] != "")
                {
                   
                    $indexView = new View('HistoriqueReservation');
                    $rm = new ReservationManager();
                    $searchRes = $rm->searchRequest($_POST["champ"]);

                    $year = Date('Y');
                    $month = Date('m');
                    $day = Date('d');
                    $date = $year . "-" . $month . "-" . $day;

                    $indexView->generer([
                        'allreservation' => $searchRes,  
                        'popup' => "",
                        'date' => $date,
                         'filtre' =>  $_POST["champ"]       
                    ]);
                }
                else
                {
                    $indexView = new View('HistoriqueReservation');
                    $indexView->generer([
                        'popup' => "Le champ type est obligatoire"         
                    ]);
                }
            }          
        
        else{
            $indexView = new View('HistoriqueReservation');
            $indexView->generer([]);
        }
        
    }

}

?>