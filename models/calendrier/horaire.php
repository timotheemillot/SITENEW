<?php

require_once("models/Model.php");

class Horaire extends Model{ 

    var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    var $months = array('janvier', 'février', 'mars', 'avril', "mai", 'juin', 'juillet', 'août', 'septembre', 'ocotbre', 'novembre', 'décembre');
    var $annee ;



    function getEvents($year){
        $annee = $year;
        global $bdd;

        $param = array($year);
        $req = $this->execRequest('SELECT IdReservation, Nom, date, Véhicule, Nombre_covoit FROM reservation WHERE YEAR(date) = ?', $param)->fetchall();
        $r = array();

        foreach($req as $d){
            $r[strtotime($d['date'])][$d['IdReservation']] = $d['Nom'] . " || " . " Covoit à " . $d['Nombre_covoit'] . " Personnes.";
        }

        return $r;
    }


    function getAll($year){
        $r = array();
        $annee = $year;

        $date = new DateTime($annee.'-01-01');

        while($date->format('Y') <= $annee){

            $y = $date->format('Y');
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0', '7', $date->format('w'));
            $r[$y][$m][$d] = $w ;
            
            $date->add(new DateInterval('P1D'));
        }

        return $r;
    }

   

}
?>