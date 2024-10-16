<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E5: Option " Solutions logicielles et Applications métiers

  </title>

  <link href="styles.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
</head>
<body>



  <div class="container">
    <h1>Prise de rendez vous</h1>

    <div>
      <div>
        <h3>Filtres</h3>
      </div>
      <p>
      <select name="Centre medical" id="Centre medical-select">
        <option value="">--Centre d'imagerie médical--</option>
        <option value=" IRM">IRM</option>
        <option value=" Radiologie">Radiologie</option>
        <option value=" Scanner">Scanner</option>
        <option value="Echographie">Ecographie</option>
        <option value="">--Centre de psychatrie--</option>
        <option value=" psychatrie">psychatrie</option>
        <option value=" maison de repos">maison de repos</option>
      </select>
    </p>
   <select name="Region medical" id="Region medical-select">
      <option value="">--Régions--</option>
      <option value=" Région Haut de France">Région Haut de France</option>
      <option value="Région Normandie">Région Normandie</option>
      <option value=" Région Ile de France">Région Ile de France</option>
      <option value=" Région Nord Pas de Calais">Région Nord Pas de Calais</option>
      <option value=" Région Bretagne">Région Bretagne</option>
      <option value=" Région Occitanie">Région Occitanie</option>
      <option value=" Région Grand Est">Région Grand Est</option>
    </select>
 

    
    <label for="Docteur-select">Choisir le docteur:</label>

    <select name="Docteur" id="Docteur-select">
      <option value="">--Docteur--</option>
      <option value="Dr Dupont">Dr Dupont</option>
      <option value="Dr Mirabellle">Dr Mirabelle</option>
      <option value="Dr Séville">Dr Seville</option>
      <option value="Dr Poirrot">Dr Poirrot</option>



      <label fort="start">Start date :</label>
      <input type="date" id="start" name="trip-start" value="2024-07-26" min="2024-07-28" max="2026-12-31/">
  

    </select>
  </div>
  <a href="accueil.php">Aller à Accueil</a>
  
  <a href="planningmedecin.php">Aller à la page planningmedecin</a>

</body>

</html>