<?php

class Vidange{

    private int $idVidange;
    private int $cadenceVidange;
    private int $kmDerniereVidange;
    private int $vidangeAFaire;

    private int $idVehicule;

	/**
	 * @return int
	 */
	public function getIdVidange(): int {
		return $this->idVidange;
	}
	
	/**
	 * @param int $idVidange 
	 * @return self
	 */
	public function setIdVidange(int $idVidange): self {
		$this->idVidange = $idVidange;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCadenceVidange(): int {
		return $this->cadenceVidange;
	}
	
	/**
	 * @param int $cadenceVidange 
	 * @return self
	 */
	public function setCadenceVidange(int $cadenceVidange): self {
		$this->cadenceVidange = $cadenceVidange;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getKmDerniereVidange(): int {
		return $this->kmDerniereVidange;
	}
	
	/**
	 * @param int $kmDernierVidange 
	 * @return self
	 */
	public function setKmDerniereVidange(int $kmDernierVidange): self {
		$this->kmDerniereVidange = $kmDernierVidange;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getVidangeAFaire(): int {
		return $this->vidangeAFaire;
	}
	
	/**
	 * @param bool $vidangeAFaire 
	 * @return self
	 */
	public function setVidangeAFaire(int $vidangeAFaire): self {
		$this->vidangeAFaire = $vidangeAFaire;
		return $this;
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

	/**
	 * @return int
	 */
	public function getIdVehicule(): int {
		return $this->idVehicule;
	}
	
	/**
	 * @param int $idVehicule 
	 * @return self
	 */
	public function setIdVehicule(int $idVehicule): self {
		$this->idVehicule = $idVehicule;
		return $this;
	}
}

?>