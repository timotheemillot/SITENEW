<?php

require_once("models/Model.php");
require_once("models/Compte.php");

class CompteManager extends Model{

    public function createCompte(Compte $compte)
    {
        $param = array( $compte->getNom(), 
                        $compte->getPrenom(), 
                        $compte->getEmail(), 
                        $compte->getNumero(), 
                        $compte->getDateDeNaissance(), 
                        $compte->getIdentifiant(), 
                        $compte->getMotDePasse());

        $this->execRequest('INSERT INTO compte(nom,prenom,email,numero,datedenaissance,identifiant,motdepasse) VALUES (?,?,?,?,?,?,?)', $param);
        
        $id = ($this->execRequest('SELECT LAST_INSERT_ID()'))->fetch();
        $compte->setIdCompte($id[0]);
        return $compte;
    }

    public function selectByIdentifiant(string $identifiant)
    {
        $param = array($identifiant);
        $compteData = $this->execRequest('SELECT * FROM compte WHERE Identifiant = ?', $param)->fetch();
        if($compteData != false)
        {
            $compte = new Compte();
            $compte->hydrate($compteData);
            return $compte;
        }
        else
        {
            return null;
        }
        
    }

    /**
     * Permet de savoir si une compte avec le même identifiant, le même email ou le même numéro existe déjà.
     * @param mixed $identifiant
     * @param mixed $email
     * @param mixed $numero
     * @return array<bool> tableau à 3 cases (pour identifiant, email et numero), false si l'élément existe déjà et true sinon
     */
    public function checkAlreadyExists($identifiant, $email, $numero)
    {
        

        $param = array($identifiant);
        $checkIdentifiant = $this->execRequest('SELECT * FROM compte WHERE Identifiant = ?', $param)->fetch();
        $param = array($email);
        $checkEmail = $this->execRequest('SELECT * FROM compte WHERE Email = ?',$param)->fetch();
        $param = array($numero);
        $checkNumero = $this->execRequest('SELECT * FROM compte WHERE Numero = ?',$param)->fetch();
        if ($checkIdentifiant == false)
        {
            $resIdentifiant = false;
        } 
            else {
                $resIdentifiant = true;
            }
        if ($checkEmail == false)
        {
            $resEmail = false;
        }     
            else
            {
                $resEmail = true;
            }
        if ($checkNumero == false)
        {
            $resNumero = false;
        }
            else
            {
                $resNumero = true;
            }
                

        $res = array(
            "identifiant" => $resIdentifiant,
            "email" => $resEmail,
            "numero" => $resNumero
        );

        var_dump($res);
        return $res;
    }
}

?>