<?php

require_once("views/View.php");
require_once("models/VehiculeManager.php");
require_once("controllers/MainController.php");
require_once("models/Vehicule.php");
require_once("models/details/Vidange.php");

class VehiculeController
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

    function displayDetail($idVehicule)
    {
        $indexView = new View('Detail');
        $vm = new VehiculeManager();
        $vehicule = $vm->getById($idVehicule);
        $indexView->generer([
            'vehicule' => $vehicule
        ]);

    }

    function displayAddVidange($idVehicule)
    {
         if (isset($_POST['submit']))
         {
            $vm = new VehiculeManager();
            $vehicule = $vm->getById($idVehicule);
            if ($_POST['kmDerniereVidange'] > $_POST['cadenceVidange'])
                $vidangeAFaire = 1;
            else
                $vidangeAFaire = 0;

            $vidangeData = array(
                "cadenceVidange" => $_POST['cadenceVidange'],
                "kmDerniereVidange" => $_POST['kmDerniereVidange'],
                "vidangeAFaire" => $vidangeAFaire,
                "idVehicule" => $idVehicule
            );
            $vidange = new Vidange();
            $vidange->hydrate($vidangeData);
            $message = $this->addVidange($vidange);
            
            
            $indexView = new View('Detail');
            $indexView->generer([
                'vehicule' => $vehicule,
                'popup' => $message
            ]);
         }
         else
         {
            $vm = new VehiculeManager();
            $indexView = new View('AddVidange');
            $indexView->generer([
                'titre' => "Ajouter une donnée vidange",
                'idVehicule' => $idVehicule
            ]);

         }
    }

    function addVidange(Vidange $vidange)
    {
        $vm = new VehiculeManager();
        $vm->addVidange($vidange);
        return "Donnée vidange ajoutée";

    }

    function displayAddCourroie($idVehicule)
    {
         if (isset($_POST['submit']))
         {
            $vm = new VehiculeManager();
            $vehicule = $vm->getById($idVehicule);
            if ($_POST['kmDerniereCourroie'] > $_POST['cadenceCourroie'])
                $courroieARemplacer = 1;
            else
                $courroieARemplacer = 0;

            $courroieData = array(
                "cadenceCourroie" => $_POST['cadenceCourroie'],
                "kmDerniereCourroie" => $_POST['kmDerniereCourroie'],
                "courroieARemplacer" => $courroieARemplacer,
                "idVehicule" => $idVehicule
            );
            $courroie = new Courroie();
            $courroie->hydrate($courroieData);
            $message = $this->addCourroie($courroie);
            
            
            $indexView = new View('Detail');
            $indexView->generer([
                'vehicule' => $vehicule,
                'popup' => $message
            ]);
         }
         else
         {
            $vm = new VehiculeManager();
            $indexView = new View('AddCourroie');
            $indexView->generer([
                'titre' => "Ajouter une donnée courroie",
                'idVehicule' => $idVehicule
            ]);

         }
    }
    function addCourroie(Courroie $courroie)
    {
        $vm = new VehiculeManager();
        $vm->addCourroie($courroie);
        return "Donnée courroie ajoutée";
    }

}


?>