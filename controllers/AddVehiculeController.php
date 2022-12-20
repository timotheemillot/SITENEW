<?php

require_once("views/View.php");
require_once("models/VehiculeManager.php");
require_once("controllers/MainController.php");
require_once("models/Vehicule.php");

class AddVehiculeController
{
    //on rentre un message facultatif à l'index permettant d'afficher des messages d'erreur ou de reussite
    public function displayAddVehicule() : void 
    {
        if(isset($_POST['submit']))
        {
            $vehiculeData = array(
                "marque" => $_POST['marque'],
                "modele" => $_POST['modele'],
                "immatriculation" => $_POST['immatriculation'],
                "site" => $_POST['site'],
                "carburant" => $_POST['carburant'],
                "miseenservice" => $_POST['miseenservice'],
                "critair" => $_POST['critair'],
                "assurance" => $_POST['assurance'],
                "puissance" => $_POST['puissance'],
                "ageparc" => $_POST['ageparc']
            ); 
            $vehicule = new Vehicule();
            $vehicule->hydrate($vehiculeData);
            $popup = $this->addVehicule($vehicule);
            $mc = new MainController();
            $mc->displayVehicule($popup);

        }
        else
        {
            $indexView = new View('AddVehicule');
            $vm = new VehiculeManager();
            $indexView->generer([
            'titre' => "Ajouter un vehicule",
            ]);
        }
        

                       
    }

    function addVehicule(Vehicule $vehicule) : string
    {
        $vm = new VehiculeManager();
        $vehicules = $vm->createVehicule($vehicule);
        if (isset($vehicules))
            $popup = "Reussite : Vehicule créé";
        else
            $popup = "Erreur : Vehicule non créé";
        
       return $popup;
    }

    function displayEditVehicule(?int $idVehicule = null)
    {
        if(isset($_POST['submit']))
        {
            $vehiculeData = array(
                "idVehicule" => $_POST['idVehicule'],
                "marque" => $_POST['marque'],
                "modele" => $_POST['modele'],
                "immatriculation" => $_POST['immatriculation'],
                "site" => $_POST['site'],
                "carburant" => $_POST['carburant'],
                "miseenservice" => $_POST['miseenservice'],
                "critair" => $_POST['critair'],
                "assurance" => $_POST['assurance'],
                "puissance" => $_POST['puissance'],
                "ageparc" => $_POST['ageparc']
            ); 
            $vehicule = new Vehicule();
            $vehicule->hydrate($vehiculeData);
            $this->editVehicule($vehicule);
            $indexView = new View('Vehicule');
            $vm = new VehiculeManager();
            $indexView->generer([
                'popup' => "Vehicule modifié",
                'allVehicule' => $vm->getAll()
            ]);
        }
        else
        {
            $vm = new VehiculeManager();
            $vehicule = new Vehicule();
            $vehicule = $vm->getById($idVehicule);
            $indexView = new View('AddVehicule');
            $indexView->generer([
                'titre' => 'Modifier un véhicule',
                'vehicule' => $vehicule
            ]);

        }
    }

    function editVehicule($vehicule)
    {
        $vm = new VehiculeManager();
        $vm->editVehicule($vehicule);
    }

    function deleteVehicule($idVehicule)
    {
        $vm = new VehiculeManager();
        $vm->deleteVehicule($idVehicule);
        $vehicule = $vm->getById($idVehicule);
        if(isset($vehicule))
        {
            $message = "Erreur lors de la suppresion";
        }
        else
        {
            $message = "Vehicule supprimé";
        }

        $indexView = new View('Vehicule');
        $indexView->generer([
            'popup' => $message,
            'allVehicule' => $vm->getAll()
        ]);
    }

}


?>