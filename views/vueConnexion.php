<h1><img id="imglogo" src="public/img/logo.png"></h1>
  <div id="divform">
    <h2>Connexion</h2>
    <br>
    <br>
    <form action="index.php?action=connexion" method="POST"> 
      <div id="divformcontent"> 
        <div class="divinput">
            <input type="text" class="textinput" name="identifiant" required  placeholder="Identifiant"> <br>
        </div>
        <div class="divinput">
            <input type="password" name="motdepasse" class="textinput" required placeholder="Mot de passe">  
        </div>
        <p id="submit">
          <input type="submit" name="submit" value="Se connecter" id="button" accesskey="enter">
        </p>
        
      </div> 
      <?php if(isset($popup))echo "<p class=\"popup\">" . $popup . "</p>";?> 
    </form> 
    
  </div>
  <p id="pinscrire">Nouveau membre ? <a href="index.php?action=inscription"> S'inscrire</a></p>