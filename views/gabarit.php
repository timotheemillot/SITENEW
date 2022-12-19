
<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="public/css/main.css"/>
<link rel="stylesheet" href="public/css/objects.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="public/img/logo.png">
<title><?= $titre ?></title>
</head>
<body>
<header>
<!-- Menu -->
<nav>

    <a href="index.php"><img src="public/img/logo.png" class="logo" alt=""></a>
    <ul>
        <li><a href="index.php?action=vehicule">Véhicule</a></li>
        <li><a href="#">Réservation</a></li>
        <li><a href="#">Statistique</a></li>
    </ul>
    <a href="index.php?action=compte"><img  src="public/img/compte.png" class="compte" alt="" ></a>
</nav>

</header>
<!-- #contenu -->
<main id="contenu">
    <?= $contenu ?>
</main>
<footer>
        <div id="divtopfooter">
        <div id="divhelp">
            <span id="needhelptext">Besoin d'aide ? </span>
            <a id="needhelplink" href="index.php?action=contact">Contactez-nous !</a> 
        </div>
        <a id="policonf" href="index.php?action=policonf">Politique de confidentialité<a>
        <div id="langue">
            <label for="langues">Langue:</label>
            <select name="langues" id="">
            <option value="">Français</option>
            <option value="">Anglais</option>
            </select>
        </div>
        </div>
        
        <p id="copyright">Copyright 2022 -- AirPur -- Tous droits réservés</p>
    
    </footer>
</body>
</html>
