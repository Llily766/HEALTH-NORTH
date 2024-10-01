

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E5: Option " Solutions logicielles et Applications métiers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>
<body>

  <form action="action.php"method="post">
  <?php echo '<p>Bonjour le monde</p>'; ?>
    <h3>Consultation du dossier patient :</h3>
    <div class="inputs">
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Mot de passe"/>
    
      <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
      <p>Créer un compte</p>
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Mot de passe"/><br/>
     
      <a href="accueil.html">Aller à la page Accueil</a>
      <p>(ou consulter votre dossier patient sans modification)</p>
    </div>
  </form>
</body>
</html>
