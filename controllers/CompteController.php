<?php

require_once("models/CompteManager.php");
require_once("models/Compte.php");
require_once("views/View.php");

class CompteController{



    public function displayConnexion()
    {
        if (isset($_POST['submit']))
        {
            $checkConnexion = $this->checkConnexion($_POST['identifiant'], $_POST['motdepasse']);
            if ($checkConnexion == "Connexion reussie")
            {
                $cm = new CompteManager();
                setcookie("compte", $_POST['identifiant'], time()+3600*2); // le compte reste actif 2 heure sauf si deconnexion
                $indexView = new View('Index');
                $indexView->generer([]);
            }
            else
            {

                $indexView = new View('Connexion');
                $indexView->generer2([
                    'popup' => $checkConnexion
                ]);
            }
        }
        else
        {
            $indexView = new View('Connexion');
            $indexView->generer2([]);
        }
        
    }

    public function displayInscription()
    {
        if(isset($_POST['submit']))
        {
            $checkInscription = $this->checkInscription($_POST['identifiant'], $_POST['email'], $_POST['numero']);
            if ($checkInscription == "Inscription reussie")
            {
                $compteData = array(
                    "nom" => $_POST['nom'],
                    "prenom" => $_POST['prenom'],
                    "email" => $_POST['email'],
                    "numero" => $_POST['numero'],
                    "dateDeNaissance" => $_POST['datedenaissance'],
                    "identifiant" => $_POST['identifiant'],
                    "motDePasse" => $_POST['motdepasse']
                );
                $compte = new Compte();
                $compte->hydrate($compteData);
                $this->createCompte($compte);
                $indexView = new View('Connexion');
                $indexView->generer2([
                    'popup' => $checkInscription
                ]);
            }
            else
            {
                $indexView = new View('Inscription');
                $indexView->generer2([
                    'popup' => $checkInscription
                ]);
            }
        }
        else
        {
            $indexView = new View('Inscription');
            $indexView->generer2([]);
        }
    }

    public function displayCompte()
    {
        $cm = new CompteManager();
        $identifiantCompte = $_COOKIE['compte'];
        $compte = new Compte();
        $compte = $cm->selectByIdentifiant($identifiantCompte);
        $indexView = new View('Compte');
        $indexView->generer([
            'compte' => $compte
        ]);
    }

    public function checkConnexion($identifiant, $motdepasse)
    {
        $cm = new CompteManager();
        $compte = $cm->selectByIdentifiant($identifiant);
        if(isset($compte))
        {
            if ($compte->getMotdepasse() == $motdepasse)
            {
                $message = "Connexion reussie";
            }
            else
            {
                $message = "Mot de passe incorrect";
            }
        }
        else
        {
            $message = "Identifiant inconnu";
        }

        return $message;
    }

    public function checkInscription($identifiant, $email, $numero)
    {
        $cm = new CompteManager();
        $infos = $cm->checkAlreadyExists($identifiant, $email, $numero);
        if ($infos['identifiant'] == true)
        {
            $message = "Identifiant déjà utilisé";
        }
            else if ($infos['email'] == true)
            {
                $message = "Email déjà utilisé";
            }
                else if ($infos['numero'] == true)
                {
                    $message = "Numero déjà utilisé";
                } 
                    else
                        $message = "Inscription reussie";

        return $message;
    }

    public function createCompte(Compte $compte)
    {
        $cm = new CompteManager();
        $cm->createCompte($compte);
    }

    public function deconnexion()
    {
        setcookie('compte', '', time() - 3600); // suppression du cookie
        $indexView = new View('Connexion');
        $indexView->generer2([]);
    }

}

?>