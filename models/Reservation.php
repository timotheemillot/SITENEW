<?php

class Reservation{

    private int $idReservation;
    private string $nom;
    private string $date;
    private string $vehicule;
    private int $nombrecovoit;

    public function __construct()
    {   

    }

    public function getIdReservation(){
        return $this->idReservation;
    }
    public function setIdReservation($idReservation){
        $this->idReservation = $idReservation;
    }


    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }


    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }


    public function getVéhicule(){
        return $this->vehicule;
    }

    public function setvéhicule($vehicule){
        $this->vehicule = $vehicule;
    }

    public function getNombre_covoit(){
        return $this->nombrecovoit;
    }
    public function setNombre_covoit($nombrecovoit){
        $this->nombrecovoit = $nombrecovoit;
    }




    public function hydrate(array $donnees)
    {
       foreach ($donnees as $key => $value)
       {
          // On récupère le nom du setter correspondant à l'attribut.
          $method = 'set'.ucfirst($key);
          // Si le setter correspondant existe.
          if (method_exists($this, $method))
          {
             // On appelle le setter.
             $this->$method($value);
          }
       }
    }


    
}


?>