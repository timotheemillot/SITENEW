<?php

class Vidange{

    private int $idVidange;

	private string $dateVidange;
    private int $kmDerniereVidange;

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

	/**
	 * @return string
	 */
	public function getDateVidange(): string {
		return $this->dateVidange;
	}
	
	/**
	 * @param string $dateVidange 
	 * @return self
	 */
	public function setDateVidange(string $dateVidange): self {
		$this->dateVidange = $dateVidange;
		return $this;
	}
}

?>