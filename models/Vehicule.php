<?php

class Vehicule{

    private int $idVehicule;
    private string $marque;
    private string $modele;
    private string $immatriculation;
    private string $site;
    private string $carburant;
    private string $miseEnService;
    private int $critair;
    private string $assurance;
    private int $puissance;
    private int $disponible; // 1 pour oui, 0 pour non
    //private int $ageParc;

    private ?int $cadenceVidange;

    private ?int $cadenceCourroie;

    public function __construct()
    {

    }

    public function getIdVehicule(){
        return $this->idVehicule;
    }
    public function setIdVehicule($idVehicule){
        $this->idVehicule = $idVehicule;
    }

    public function getMarque(){
        return $this->marque;
    }
    public function setMarque($marque){
        $this->marque=$marque;
    }

    public function getModele(){
        return $this->modele;
    }
    public function setModele($modele){
        $this->modele=$modele;
    }

    public function getImmatriculation(){
        return $this->immatriculation;
    }
    public function setImmatriculation($immatriculation){
        $this->immatriculation=$immatriculation;
    }

    public function getSite(){
        return $this->site;
    }
    public function setSite($site){
        $this->site=$site;
    }

    public function getCarburant(){
        return $this->carburant;
    }
    public function setCarburant($carburant){
        $this->carburant=$carburant;
    }

    public function getMiseEnService(){
        return $this->miseEnService;
    }
    public function setMiseEnService($miseEnService){
        $this->miseEnService=$miseEnService;}

    public function getCritair(){
        return $this->critair;
    }
    public function setCritair($critair){
        $this->critair=$critair;
    }

    public function getAssurance(){
        return $this->assurance;
    }
    public function setAssurance($assurance){
        $this->assurance=$assurance;
    }

    public function getPuissance(){
        return $this->puissance;
    }
    public function setPuissance($puissance){
        $this->puissance=$puissance;
    }

    public function getAgeParc(){
        return $this->ageParc;
    }
    public function setAgeParc($ageParc){
        $this->ageParc=$ageParc;
    }
    public function getVidange()
    {
        $vm = new VehiculeManager();
        return $vm->getVidange($this->idVehicule);
    }

    public function getCourroie()
    {
        $vm = new VehiculeManager();
        return $vm->getCourroie($this->idVehicule);
    }

    public function getCt()
    {
        $vm = new VehiculeManager();
        return $vm->getCt($this->idVehicule);
    }

    public function getIntervention()
    {
        $vm = new VehiculeManager();
        return $vm->getIntervention($this->idVehicule);
    }
    

   

    public function hydrate(array $donnees)
    {
       foreach ($donnees as $key => $value)
       {
          // On r??cup??re le nom du setter correspondant ?? l'attribut.
          $method = 'set'.ucfirst($key);
          // Si le setter correspondant existe.
          if (method_exists($this, $method))
          {
             // On appelle le setter.
             $this->$method($value);
          }
       }
    }



	/**
	 * @return int
	 */
	public function getCadenceVidange(): int {
		if(isset($this->cadenceVidange))
            return $this->cadenceVidange;
        else
            return 0;
	}
	
	/**
	 * @param int $candenceVidange 
	 * @return self
	 */
	public function setCadenceVidange(?int $cadenceVidange): self {
		$this->cadenceVidange = $cadenceVidange;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCadenceCourroie(): int {
        if (isset($this->cadenceCourroie))
            return $this->cadenceCourroie;
        else
            return 0;
	}
	
	/**
	 * @param int $cadenceCourroie 
	 * @return self
	 */
	public function setCadenceCourroie(?int $cadenceCourroie): self {
		$this->cadenceCourroie = $cadenceCourroie;
		return $this;
	}


	/**
	 * @return int
	 */
	public function getDisponible(): int {
		return $this->disponible;
	}
	
	/**
	 * @param int $disponible 
	 * @return self
	 */
	public function setDisponible(int $disponible): self {
		$this->disponible = $disponible;
		return $this;
	}
}

?>