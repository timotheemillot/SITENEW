<?php

class Ct{

    private int $idCt;
    private string $dateDernierCt;
    private int $complementaireCt; //bool mais la bdd accepte pas bool ducoup int mais 0 ou 1
    private string $dateProchainCt;

    private int $idVehicule;



	/**
	 * @return int
	 */
	public function getIdCt(): int {
		return $this->idCt;
	}
	
	/**
	 * @param int $idCt 
	 * @return self
	 */
	public function setIdCt(int $idCt): self {
		$this->idCt = $idCt;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDateDernierCt(): string {
		return $this->dateDernierCt;
	}
	
	/**
	 * @param string $dateDernierCt 
	 * @return self
	 */
	public function setDateDernierCt(string $dateDernierCt): self {
		$this->dateDernierCt = $dateDernierCt;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getComplementaireCt(): int {
		return $this->complementaireCt;
	}
	
	/**
	 * @param bool $complementaire 
	 * @return self
	 */
	public function setComplementaireCt(int $complementaireCt): self {
		$this->complementaireCt = $complementaireCt;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDateProchainCt(): string {
		return $this->dateProchainCt;
	}
	
	/**
	 * @param string $dateProchainCt 
	 * @return self
	 */
	public function setDateProchainCt(string $dateProchainCt): self {
		$this->dateProchainCt = $dateProchainCt;
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