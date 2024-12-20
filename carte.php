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
        <a href="quiSommesNous.php" aria-label="Qui sommes-nous ?">Qui sommes-nous?</a>
        <a class="active"href="carte.php" aria-label="Nous contacter">Contact</a>
        <a href="lien.php" aria-label="Créer un rendez-vous">Créer un rendez-vous</a>
        <a href="planningmedecin.php" aria-label="Voir le planning du médecin">Planning</a>
        <a href="centre.php" aria-label="Voir la liste des centres disponibles">Liste des centres</a>
    </div>
</div> 
    
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

    
