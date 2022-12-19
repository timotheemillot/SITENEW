<?php

class Compte{
    private int $idCompte;
    private string $prenom;
    private string $nom;
    private string $email;
    private string $numero;
    private string $identifiant;
    private string $motDePasse;
    private string $dateDeNaissance;



	/**
	 * @return int
	 */
	public function getIdCompte(): int {
		return $this->idCompte;
	}
	
	/**
	 * @param int $idCompte 
	 * @return self
	 */
	public function setIdCompte(int $idCompte): self {
		$this->idCompte = $idCompte;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrenom(): string {
		return $this->prenom;
	}
	
	/**
	 * @param string $prenom 
	 * @return self
	 */
	public function setPrenom(string $prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNom(): string {
		return $this->nom;
	}
	
	/**
	 * @param string $nom 
	 * @return self
	 */
	public function setNom(string $nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @param string $email 
	 * @return self
	 */
	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNumero(): string {
		return $this->numero;
	}
	
	/**
	 * @param string $numero 
	 * @return self
	 */
	public function setNumero(string $numero): self {
		$this->numero = $numero;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getIdentifiant(): string {
		return $this->identifiant;
	}
	
	/**
	 * @param string $identifiant 
	 * @return self
	 */
	public function setIdentifiant(string $identifiant): self {
		$this->identifiant = $identifiant;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMotDePasse(): string {
		return $this->motDePasse;
	}
	
	/**
	 * @param string $motdepasse 
	 * @return self
	 */
	public function setMotDePasse(string $motDePasse): self {
		$this->motDePasse = $motDePasse;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDateDeNaissance(): string {
		return $this->dateDeNaissance;
	}
	
	/**
	 * @param string $dateDeNaissance 
	 * @return self
	 */
	public function setDateDeNaissance(string $dateDeNaissance): self {
		$this->dateDeNaissance = $dateDeNaissance;
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
}

?>