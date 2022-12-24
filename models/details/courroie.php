<?php

class Courroie{

    private int $idCourroie;
	private string $dateChangementCourroie;
    private int $kmDerniereCourroie;
    private int $idVehicule;


	/**
	 * @return int
	 */
	public function getIdCourroie(): int {
		return $this->idCourroie;
	}
	
	/**
	 * @param int $idCourroie 
	 * @return self
	 */
	public function setIdCourroie(int $idCourroie): self {
		$this->idCourroie = $idCourroie;
		return $this;
	}


	/**
	 * @return int
	 */
	public function getKmDerniereCourroie(): int {
		return $this->kmDerniereCourroie;
	}
	
	/**
	 * @param int $kmDernierCourroie 
	 * @return self
	 */
	public function setKmDerniereCourroie(int $kmDerniereCourroie): self {
		$this->kmDerniereCourroie = $kmDerniereCourroie;
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
	 * @return int
	 */
	public function getDateChangementCourroie(): string {
		return $this->dateChangementCourroie;
	}
	
	/**
	 * @param int $dateChangementCourroie 
	 * @return self
	 */
	public function setDateChangementCourroie(string $dateChangementCourroie): self {
		$this->dateChangementCourroie = $dateChangementCourroie;
		return $this;
	}
}


?>