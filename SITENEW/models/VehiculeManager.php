<?php

require_once("models/Model.php");
require_once("models/Vehicule.php");

    class VehiculeManager extends Model
    {
        public function getAll() : array
        {
            $allVehiculeData = ($this->execRequest('SELECT * FROM Vehicule'))->fetchAll();
            $allVehiculeTab = array();
            
            foreach($allVehiculeData as $vehiculeData)
            {
                $vehicule = new Vehicule();
                $vehicule->hydrate($vehiculeData);
                array_push($allVehiculeTab, $vehicule);
            }
            return $allVehiculeTab;
        }

        function createVehicule(Vehicule $vehicule) : Vehicule
        {
            $param = array($vehicule->getMarque(), $vehicule->getModele(), $vehicule->getImmatriculation(), $vehicule->getSite(), $vehicule->getCarburant(), $vehicule->getMiseEnService(), $vehicule->getCritair(), $vehicule->getAssurance(), $vehicule->getPuissance(), $vehicule->getAgeParc());
            $req = $this->execRequest('INSERT INTO Vehicule(marque,modele,immatriculation,site,carburant,miseenservice,critair,assurance,puissance,ageparc) VALUES (?,?,?,?,?,?,?,?,?,?)',$param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $vehicule->setIdVehicule($id[0]);

            return $vehicule;  
        }
    }

?>