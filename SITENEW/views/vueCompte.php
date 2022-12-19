<table id = "tableau">
        <tr>
            <th id="entete" colspan="2">Informations du compte</th>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche"><a  class = "titre">Nom : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getNom() ?> </a></td>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche"><a  class = "titre">Prenom : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getPrenom() ?> </a></td>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche" ><a  class = "titre">Email : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getEmail() ?> </a></td>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche" ><a  class = "titre">Numéro : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getNumero() ?> </a></td>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche" ><a  class = "titre">Date de naissance : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getDateDeNaissance() ?> </a></td>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche" ><a  class = "titre">Identifiant : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getIdentifiant() ?> </a></td>
        </tr>
        <tr class = "ligne">
            <td class = "colonnegauche" ><a  class = "titre">Mot de passe : </a></td>
            <td class = "colonnedroite"> <a class="infos"> <?= $compte->getMotDePasse() ?> </a></td>
        </tr>      
</table>
<div class="bout">
    <a href="index.php?action=deconnexion">Deconnexion</a>
</div>
<br>