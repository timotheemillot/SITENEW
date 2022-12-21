<?php

class Intervention{

    private int $idIntervention;
    private string $date;
    private int $cout;
    private int $kilometre;
    private string $description;
    private int $idVehicule;

	/**
	 * @return int
	 */
	public function getIdIntervention(): int {
		return $this->idIntervention;
	}
	
	/**
	 * @param int $idIntervention 
	 * @return self
	 */
	public function setIdIntervention(int $idIntervention): self {
		$this->idIntervention = $idIntervention;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDate(): string {
		return $this->date;
	}
	
	/**
	 * @param string $date 
	 * @return self
	 */
	public function setDate(string $date): self {
		$this->date = $date;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getCout(): int {
		return $this->cout;
	}
	
	/**
	 * @param int $cout 
	 * @return self
	 */
	public function setCout(int $cout): self {
		$this->cout = $cout;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getKilometre(): int {
		return $this->kilometre;
	}
	
	/**
	 * @param int $kilometre 
	 * @return self
	 */
	public function setKilometre(int $kilometre): self {
		$this->kilometre = $kilometre;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
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