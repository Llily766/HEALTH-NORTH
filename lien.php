<?php
session_start();

if (!isset($_SESSION['id_patient'])) {
    echo "<div class='alert alert-danger'>Erreur : Vous devez être connecté pour prendre un rendez-vous.</div>";
    exit;
}
    // Connexion à la base de données
    try {
        $servername = "192.168.1.15";
        $username = "healthnorth";
        $password = "healthnorth-password";
        $dbname = "inscriptions";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation et exécution de la requête
        $stmtExamen = $conn->prepare("SELECT * FROM examen");
        $stmtExamen->execute();

        $stmtCabinetMedical = $conn->prepare("SELECT * FROM `cabinet médical`");
        $stmtCabinetMedical->execute();

        $stmtMedecin = $conn->prepare("SELECT * FROM medecin");
        $stmtMedecin->execute();

        // Récupération des résultats
        $examens = $stmtExamen->fetchAll(PDO::FETCH_ASSOC);
        $cabinetsMedical = $stmtCabinetMedical->fetchAll(PDO::FETCH_ASSOC);
        $medecins = $stmtMedecin->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Erreur!</strong>
                <span class='block sm:inline'> Impossible de se connecter à la base de données: " . $e->getMessage() . "</span>
              </div>";
    }
    
    // Traitement du formulaire pour enregistrer un rendez-vous
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $centre = $_POST['centre'];
        $medecin = $_POST['medecin'];
        $date = $_POST['date'];
        $type_examen = $_POST['type_examen'];
        #$notes = $_POST['notes'] ?? null;
        $id_patient = $_SESSION['id_patient'];

        if ($centre && $medecin && $date && $type_examen) {
            try {
                // Requête d'insertion
                $stmt = $conn->prepare("
                    INSERT INTO rdv (id_medecin, id_cabinetMedical, id_examen, id_patient, Date) 
                    VALUES (:medecin, :centre, :type_examen, :id_patient, :Date)
                ");
                $stmt->bindParam(':medecin', $medecin);
                $stmt->bindParam(':centre', $centre);
                $stmt->bindParam(':type_examen', $type_examen);
                $stmt->bindParam(':id_patient', $id_patient);
                #$stmt->bindParam(':notes', $notes);
                $stmt->bindParam(':Date', $date);

                // Exécuter la requête
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Le rendez-vous a été enregistré avec succès.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Erreur lors de l'enregistrement du rendez-vous.</div>";
                }
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Erreur : " . htmlspecialchars($e->getMessage()) . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Veuillez remplir tous les champs requis.</div>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>health_north</title>
    <link href="styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>    
</head>

<body>

  <div class="container">
    <div class="topnav">
    <a href=Accueil.php aria-label="Accueil">Accueil</a>
      <a href=quiSommesNous? aria-label="Qui sommes-nous ?">Qui sommes-nous?</a>
      <a href="carte.php" aria-label="Nous contacter">Contact</a>
      <a class="active"href="lien.php" aria-label="Créer un rendez-vous">Créer un rendez-vous</a>
      <a href="planningmedecin.php" aria-label="Voir le planning du médecin">Planning</a>
      <a href="centre.php" aria-label="Voir la liste des centres disponibles">Liste des centres</a>
</div>
    <img src="assets/labo.jpg " width="900px" heignt='500px'>
    
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Prise de rendez-vous médical</h1>

    <!-- Formulaire de prise de RDV -->
    <form method="POST" action="">
        <div>
            <label for="centres" class="block text-sm font-medium text-gray-700 mb-2">cabinet Médical</label>
            <select id="centres" name="centre" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <?php
                if (isset($cabinetsMedical)) {
                    foreach ($cabinetsMedical as $cabinetMedical) {
                        echo "<option value='" . htmlspecialchars($cabinetMedical['id_CabinetMedical']) . "'>" . htmlspecialchars($cabinetMedical['nom']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <!-- Sélection du médecin -->
        <div>
            <label for="medecin" class="block text-sm font-medium text-gray-700 mb-2">Medecin</label>
            <select id="medecin" name="medecin" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                <?php
                if (isset($medecins)) {
                    foreach ($medecins as $medecin) {
                        echo "<option value='" . htmlspecialchars($medecin['id_medecin']) . "'>" . htmlspecialchars($medecin['nom']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <!-- Sélection de la date -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date et heure du rendez-vous</label>
            <input type="datetime-local" id="date" name="date" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- Raison du rendez-vous -->
        <div>
            <label for="type_examen" class="block text-sm font-medium text-gray-700 mb-2">Raison du rendez-vous</label>
            <select id="type_examen" name="type_examen" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <?php
                if (isset($examens)) {
                    foreach ($examens as $examen) {
                        echo "<option value='" . htmlspecialchars($examen['id_examen']) . "'>" . htmlspecialchars($examen['nom']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <!-- Notes supplémentaires -->
        <!--<div>
            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes supplémentaires (optionnel)</label>
            <textarea id="notes" name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>-->
        <!-- Bouton de soumission -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Prendre rendez-vous
            </button>
        </div>
    </form>
    </div>
</body>
</html>