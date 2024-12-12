<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
   
    <div class="container">   
   <div class="topnav">
    <a  href="quiSommesNous.php">Qui sommes-nous?</a>
    <a href="Presentation.php">Presenter</a>
    <a href="carte.php">Contact</a>
    <a class="active" href="personne.php">Se Connecter</a>
    <a href="lien.php">Creer un rendez_vous</a>
    <a href="planningmedecin.php">Planning</a>
    <a href="centre.php">Liste des centres</a>
    
   </div>
   <img src="assets/labo.jpg "width="900px"heignt='200px'>

    
        <form action="testConnexion.php" method="POST">
            <label for="Nom">Nom</label>
            <input type="text" id="Nom" name="Nom" required>

             <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se connecter">

    </form>
    </div>
</body>
</html>