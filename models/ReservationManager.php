<?php

require_once("models/Model.php");
require_once("models/Reservation.php");


class ReservationManager extends Model{

    public function getAll() : array
    {
        $allReservationData = ($this->execRequest('SELECT * FROM reservation '))->fetchAll();
        $tab = array();
        
        foreach($allReservationData as $reservationData)
        {
            $reservation = new Reservation();
            $reservation->hydrate($reservationData);
            array_push($tab, $reservation);
        }
        return $tab;
    }


    public function getById(int $idreservation): ?Reservation
    {
        $reservation = null;
        $res = ($this->execRequest('SELECT * FROM reservation WHERE IdReservation=?',array($idreservation)))->fetch();
        if ($res)
        {   
            $reservation = new Reservation();
            $reservation->hydrate($res);
        }   
        return $reservation;
    }


    function createReservation(Reservation $reservation) : Reservation
    {
        if($reservation->getVéhicule() != ""){
            $param = array($reservation->getNom(), $reservation->getDate(), $reservation->getDurée(), $reservation->getVéhicule(), $reservation->getNombre_covoit());
            $req = $this->execRequest('INSERT INTO reservation(Nom, date, Durée, Véhicule, Nombre_covoit) VALUES (?,?,?,?,?)',$param);
            $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
            $reservation->setIdReservation($id[0]);
        }


        return $reservation;  
    }


    
    public function deleteReservation(int $idReservation)
    {
        $param = array($idReservation);
        $this->execRequest('DELETE FROM reservation WHERE IdReservation = ?',$param);

    }


    public function searchRequest(string $champ) : array 
    {
           
        $res = array();
        switch($champ)
        {
            case "Nom" : $searchRes = ($this->execRequest('SELECT * FROM reservation order by Nom'))->fetchAll(); break;
            case "Date-Cr" : $searchRes = ($this->execRequest('SELECT * FROM reservation order by Date'))->fetchAll(); break;
            case "Date-Dé" : $searchRes = ($this->execRequest('SELECT * FROM reservation order by Date DESC'))->fetchAll(); break;
            case "Durée" : $searchRes = ($this->execRequest('SELECT * FROM reservation order by Durée'))->fetchAll(); break;
            case "Véhicule" : $searchRes = ($this->execRequest('SELECT * FROM reservation order by Véhicule'))->fetchAll(); break;
            case "Nombre_covoit" : $searchRes = ($this->execRequest('SELECT * FROM reservation order by Nombre_covoit'))->fetchAll(); break;
        }
        foreach($searchRes as $data)
        {   
            $reservation = new Reservation();
            $reservation->hydrate($data);

            array_push($res, $reservation);
        }


        return $res;
    }

}

?>