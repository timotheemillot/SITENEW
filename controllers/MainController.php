<?php

require_once("views/View.php");
require_once("models/VehiculeManager.php");

class MainController
{
    //on rentre un message facultatif à l'index permettant d'afficher des messages d'erreur ou de reussite
    public function Index() : void 
    {
        $indexView = new View('Index');
        $indexView->generer([
            
        ]);               
    }

    public function displayVehicule(?string $popup = null) : void
    {
        $indexView = new View('Vehicule');
        $vm = new VehiculeManager();
        $cm = new CompteManager();
        $allVehicule = $vm->getAll();
        $indexView->generer([
            'allVehicule' => $allVehicule,
            'popup' => $popup,
            'compte' => $cm->selectByIdentifiant($_COOKIE['compte'])
        ]);
    }

    public function displayContact()
    {
        $indexView = new View('Contact');
        $indexView->generer([]);
    }

    public function displayPoliconf()
    {
        $indexView = new View('Policonf');
        $indexView->generer([]);
    }

    public function displayPresentation()
    {
        $indexView = new View('Presentation');
        $indexView->generer([]);
    }

}


?>