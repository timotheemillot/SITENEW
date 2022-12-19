<h1><img id="imglogo" src="public/img/logo.png"></h1>
<div id="divform">
  <h2>Inscription</h2>
  <br>
  <form action="index.php?action=inscription" method="POST"> 
    <div id="divformcontent">
        <div class="divinput">
            <input type="text" class="textinput" name="prenom" placeholder="Prénom" required>  
        </div>
        <div class="divinput">
            <input type="text" class="textinput" name="nom" placeholder="Nom" required>  
        </div>
        <div class="divinput">
            <input type="email" class="textinput" name="email" placeholder="E-Mail" required>  
        </div>
        <div class="divinput">
            <input type="tel" class="textinput" name="numero" placeholder="Numéro de téléphone" maxlength="12" required>  
        </div>

        <div class="divinput">
          <input type="date" class="textinput" name="datedenaissance" placeholder="Date de naissance" required>  
      </div>
        
      <div class="divinput">
          <input type="text" class="textinput" name="identifiant" placeholder="Identifiant" required> <br>
      </div>
      <div class="divinput">
          <input type="password" class="textinput" name="motdepasse" placeholder="Mot de passe" required minlength="6">  
      </div>
    </div>
      <p id="submit">
        <input id="button" type="submit" name="submit" value="S'inscrire" id="button" accesskey="enter">
      </p>
    </div> 
    <?php if(isset($popup))echo "<p class=\"popup\">" . $popup . "</p>";?> 
    <p id="pconnexion">Déjà inscrit ? <a href="index.php?action=connexion"> Se connecter</a></p>
  </form> 
</div>