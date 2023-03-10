<?php

require_once("models/Model.php");
require_once("models/Vehicule.php");
require_once("models/details/Vidange.php");
require_once("models/details/Courroie.php");
require_once("models/details/Ct.php");
require_once("models/details/Intervention.php");

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

        public function getAllDisponible() : array
        {
            $allVehiculeDispoData = ($this->execRequest('SELECT * FROM Vehicule WHERE disponible = 1'))->fetchAll();
            $allVehiculeDispoTab = array();
            
            foreach($allVehiculeDispoData as $vehiculeDispoData)
            {
                $vehicule = new Vehicule();
                $vehicule->hydrate($vehiculeDispoData);
                array_push($allVehiculeDispoTab, $vehicule);
            }
            return $allVehiculeDispoTab;
        }
        

        public function getById(int $idvehicule): ?Vehicule
        {
            $vehicule = null;
            $res = ($this->execRequest('SELECT * FROM vehicule WHERE idvehicule=?',array($idvehicule)))->fetch();
            if ($res)
            {   
                $vehicule = new Vehicule();
                $vehicule->hydrate($res);
            }   
            return $vehicule;
        }

        function createVehicule(Vehicule $vehicule) : Vehicule
        {
        $param = array($vehicule->getMarque(), $vehicule->getModele(), $vehicule->getImmatriculation(), $vehicule->getSite(), $vehicule->getCarburant(), $vehicule->getMiseEnService(), $vehicule->getCritair(), $vehicule->getAssurance(), $vehicule->getPuissance()/*, $vehicule->getAgeParc()*/);
            $req = $this->execRequest('INSERT INTO Vehicule(marque,modele,immatriculation,site,carburant,miseenservice,critair,assurance,puissance,ageparc) VALUES (?,?,?,?,?,?,?,?,?,?)',$param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $vehicule->setIdVehicule($id[0]);

            return $vehicule;  
        }

        public function editVehicule(Vehicule $vehicule)
        {
            $param = array($vehicule->getMarque(), $vehicule->getModele(), $vehicule->getImmatriculation(), $vehicule->getSite(), $vehicule->getCarburant(), $vehicule->getMiseEnService(), $vehicule->getCritair(), $vehicule->getAssurance(), $vehicule->getPuissance(), /*$vehicule->getAgeParc(),*/ $vehicule->getDisponible(), $vehicule->getIdVehicule());
            $req = $this->execRequest('UPDATE Vehicule SET marque = ?,modele = ?,immatriculation = ?,site = ?,carburant = ?,miseenservice = ?,critair = ?,assurance = ?,puissance = ?,/*ageparc = ?,*/ disponible = ? WHERE idVehicule = ?',$param);
        }

        public function deleteVehicule(int $idVehicule)
        {
            $param = array($idVehicule);
            $this->execRequest('DELETE FROM vehicule WHERE idVehicule = ?',$param);

        }

        public function getVidange($idVehicule)
        {
            $allVidange = array();
            $param = array($idVehicule);
            $allVidangeData = $this->execRequest('SELECT * FROM vidange WHERE idVehicule = ? ORDER BY dateVidange DESC', $param)->fetchAll();
            foreach($allVidangeData as $vidangeData)
            {
                $vidange = new Vidange();
                $vidange->hydrate($vidangeData);
                array_push($allVidange, $vidange);
            }
            
            return $allVidange;
        }

        public function getCourroie($idVehicule)
        {
            $allCourroie = array();
            $param = array($idVehicule);
            $allCourroieData = $this->execRequest('SELECT * FROM courroie WHERE idVehicule = ? ORDER BY dateChangementCourroie DESC', $param)->fetchAll();
            foreach($allCourroieData as $CourroieData)
            {
                $courroie = new Courroie();
                $courroie->hydrate($CourroieData);
                array_push($allCourroie, $courroie);
            }
            return $allCourroie;
        }

        public function getCt($idVehicule)
        {
            $allCt = array();
            $param = array($idVehicule);
            $allCtData = $this->execRequest('SELECT idCt, datedernierct, complementairect, dateprochainct FROM ct WHERE idVehicule = ? ORDER BY datedernierct DESC', $param)->fetchAll();
            foreach($allCtData as $CtData)
            {
                $ct = new Ct();
                $ct->hydrate($CtData);
                array_push($allCt, $ct);
            }
            return $allCt;
        }

        public function getIntervention($idVehicule)
        {
            $allIntervention = array();
            $param = array($idVehicule);
            $allInterventionData = $this->execRequest('SELECT idIntervention, date, cout, kilometre, description FROM intervention WHERE idVehicule = ? ORDER BY date DESC', $param)->fetchAll();
            foreach($allInterventionData as $interventionData)
            {
                $intervention = new Intervention();
                $intervention->hydrate($interventionData);
                array_push($allIntervention, $intervention);
            }
            return $allIntervention;
        }

        public function addVidange(Vidange $vidange) : Vidange
        {
            $param = array($vidange->getDateVidange() , $vidange->getKmDerniereVidange(), $vidange->getIdVehicule());
            $this->execRequest('INSERT INTO vidange(dateVidange ,kmdernierevidange, idvehicule) VALUES (?,?,?)', $param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $vidange->setIdVidange($id[0]);
            return $vidange;
        }

        public function updateCadenceVidange($idVehicule, $cadenceVidange)
        {
            $param = array($cadenceVidange, $idVehicule);
        $this->execRequest('UPDATE vehicule SET cadenceVidange = ? WHERE idVehicule = ?', $param);
        }

        public function addCourroie(Courroie $courroie)
        {
            $param = array($courroie->getDateChangementCourroie(), $courroie->getKmDerniereCourroie(),  $courroie->getIdVehicule());
            $this->execRequest('INSERT INTO courroie(dateChangementCourroie, kmdernierecourroie, idvehicule) VALUES (?,?,?)', $param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $courroie->setIdCourroie($id[0]);
            return $courroie;
        }

        public function updateCadenceCourroie($idVehicule, $cadenceCourroie)
        {
            $param = array($cadenceCourroie, $idVehicule);
            $this->execRequest('UPDATE vehicule SET cadenceCourroie = ? WHERE idVehicule = ?', $param);
        }

        public function addCt(Ct $ct)
        {
            $param = array($ct->getDateDernierCt(), $ct->getComplementaireCt(), $ct->getDateProchainCt(), $ct->getIdVehicule());
            $this->execRequest('INSERT INTO ct(datedernierct, complementaireCt, dateprochainct, idvehicule) VALUES (?,?,?,?)', $param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $ct->setIdCt($id[0]);
            return $ct;
        }

        public function addIntervention(Intervention $intervention)
        {
            $param = array($intervention->getDate(), $intervention->getCout(), $intervention->getKilometre(),$intervention->getDescription(), $intervention->getIdVehicule());
            $this->execRequest('INSERT INTO intervention(date, cout, kilometre,description, idvehicule) VALUES (?,?,?,?,?)', $param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $intervention->setIdIntervention($id[0]);
            return $intervention;
        }

        function deleteCourroie($idCourroie)
        {
            $param = array($idCourroie);
            $this->execRequest('DELETE FROM courroie WHERE idCourroie = ?', $param);
        }

        function deleteVidange($idVidange)
        {
            $param = array($idVidange);
            $this->execRequest('DELETE FROM vidange WHERE idVidange = ?', $param);
        }

        function deleteCt($idCt)
        {
            $param = array($idCt);
            $this->execRequest('DELETE FROM ct WHERE idCt = ?', $param);

        }

        function deleteIntervention($idIntervention)
        {
            $param = array($idIntervention);
            $this->execRequest('DELETE FROM intervention WHERE idIntervention = ?', $param);
        }




       
    }

?>