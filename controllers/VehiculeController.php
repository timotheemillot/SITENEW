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
                "puissance" => $_POST['puissance']
                //"ageparc" => $_POST['ageparc']
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
                "disponible" => $_POST['disponible']
                //"ageparc" => $_POST['ageparc']
            ); 
            $vehicule = new Vehicule();
            $vehicule->hydrate($vehiculeData);
            $this->editVehicule($vehicule);
            $indexView = new View('Vehicule');
            $vm = new VehiculeManager();
            $cm = new CompteManager();
            $indexView->generer([
                'popup' => "Vehicule modifié",
                'allVehicule' => $vm->getAll(),
                'compte' => $cm->selectByIdentifiant($_COOKIE['compte'])
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

        $mc = new MainController();
        $mc->displayVehicule($message);
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

            $vidangeData = array(
                "dateVidange" =>$_POST['dateVidange'],
                "kmDerniereVidange" => $_POST['kmDerniereVidange'],
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

    function deleteVidange($idVidange, $idVehicule)
    {
        $vm = new VehiculeManager();
        $vm->deleteVidange($idVidange);
        $message = "Donnée vidange supprimée";
        $indexView = new View('Detail');
        $indexView->generer([
            'popup' => $message,
            'vehicule' => $vm->getById($idVehicule)
        ]);
    }

    function displayEditCadenceVidange($idVehicule)
    {   
        $vm = new VehiculeManager();
        if(isset($_POST['submit']))
        {
            $vm->updateCadenceVidange($idVehicule, $_POST['cadenceVidange']);
            $indexView = new View('detail');
            $indexView->generer([
                'popup' => "Parametres modifiés",
                'vehicule' => $vm->getById($idVehicule)

            ]);

        }
        else
        {
            $indexView = new View('EditCadenceVidange');
            $indexView->generer([
                'titre' => "Modifier la cadence des vidanges",
                'cadenceVidange' => $vm->getById($idVehicule)->getCadenceVidange(),
                'idVehicule' => $idVehicule
            ]);

        }
    }

    function displayAddCourroie($idVehicule)
    {
         if (isset($_POST['submit']))
         {
            $vm = new VehiculeManager();
            $vehicule = $vm->getById($idVehicule);
            $courroieData = array(
                "dateChangementCourroie" => $_POST['dateChangementCourroie'],
                "kmDerniereCourroie" => $_POST['kmDerniereCourroie'],
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

    function deleteCourroie($idCourroie, $idVehicule)
    {
        $vm = new VehiculeManager();
        $vm->deleteCourroie($idCourroie);
        $message = "Donnée courroie supprimée";
        $indexView = new View('Detail');
        $indexView->generer([
            'popup' => $message,
            'vehicule' => $vm->getById($idVehicule)
        ]);
    }

    function displayEditCadenceCourroie($idVehicule)
    {   
        $vm = new VehiculeManager();
        if(isset($_POST['submit']))
        {
            $vm->updateCadenceCourroie($idVehicule, $_POST['cadenceCourroie']);
            $indexView = new View('detail');
            $indexView->generer([
                'popup' => "Parametres modifiés",
                'vehicule' => $vm->getById($idVehicule)

            ]);

        }
        else
        {
            $indexView = new View('EditCadenceCourroie');
            $indexView->generer([
                'titre' => "Modifier la cadence du changement de la courroie",
                'cadenceCourroie' => $vm->getById($idVehicule)->getCadenceCourroie(),
                'idVehicule' => $idVehicule
            ]);

        }
    }

    

    function displayAddCt($idVehicule)
    {
        if(isset($_POST['submit']))
        {
            $dateProchainCt = date('Y-m-d', strtotime($_POST['dateDernierCt']. ' + 4 years'));
            $ctData = array(
                'dateDernierCt' => $_POST['dateDernierCt'],
                'complementaireCt' => $_POST['complementaireCt'],
                'dateProchainCt' => $dateProchainCt,
                'idVehicule' => $idVehicule
            );
            $ct = new Ct();
            $ct->hydrate($ctData);
            $message = $this->addCt($ct);
            $vm = new VehiculeManager();
            $vehicule = $vm->getById($idVehicule);
            $indexView = new View('Detail');
            $indexView->generer([
                'vehicule' => $vehicule,
                'popup' => $message
            ]);
        }
        else
        {
            $indexView = new View('AddCt');
            $indexView->generer([
                'titre' => "Ajouter un contrôle technique",
                'idVehicule' => $idVehicule
            ]);
        }
    }

    function addCt(Ct $ct)
    {
        $vm = new VehiculeManager();
        $vm->addCt($ct);
        return "Contrôle technique ajouté";

    }


    function deleteCt($idCt, $idVehicule)
    {
        $vm = new VehiculeManager();
        $vm->deleteCt($idCt);
        $message = "Controle technique supprimée";
        $indexView = new View('Detail');
        $indexView->generer([
            'popup' => $message,
            'vehicule' => $vm->getById($idVehicule)
        ]);
    }

    function displayAddIntervention($idVehicule)
    {
        if(isset($_POST['submit']))
        {
            $interventionData = array(
                'date' => $_POST['date'],
                'cout' => $_POST['cout'],
                'kilometre' => $_POST['kilometre'],
                'description' => $_POST['description'],
                'idVehicule' => $idVehicule
            );
            $intervention = new Intervention();
            $intervention->hydrate($interventionData);
            $message = $this->addIntervention($intervention);
            $vm = new VehiculeManager();
            $vehicule = $vm->getById($idVehicule);
            $indexView = new View('Detail');
            $indexView->generer([
                'vehicule' => $vehicule,
                'popup' => $message
            ]);
        }
        else
        {
            $indexView = new View('AddIntervention');
            $indexView->generer([
                'titre' => "Ajouter une intervention",
                'idVehicule' => $idVehicule
            ]);
        }
    }

    function addIntervention(Intervention $intervention)
    {
        $vm = new VehiculeManager();
        $vm->addIntervention($intervention);
        return "Intervention ajoutée";
    }
    function deleteIntervention($idIntervention, $idVehicule)
    {
        $vm = new VehiculeManager();
        $vm->deleteIntervention($idIntervention);
        $message = "Intervention supprimée";
        $indexView = new View('Detail');
        $indexView->generer([
            'popup' => $message,
            'vehicule' => $vm->getById($idVehicule)
        ]);
    }

}
?>