<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prise de rendez-vous médical</title>
    <link href="styles.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <div class="topnav">
            <a href="quiSommesNous.php">Qui sommes-nous?</a>
            <a href="Presentation.php">Presenter</a>
            <a href="carte.php">Contact</a>
            <a href="personne.php">Se Connecter</a>
            <a href="active" href="lien.php">Creer un rendez_vous</a>
            <a href="planningmedecin.php">Planning</a>
            <a href="centre.php">Liste des centres</a>
        </div>

        <?php
        // Connexion à la base de données
        $servername = "192.168.1.15";
        $username = "healthnorth";

        $password = "healthnorth-password";

        $dbname = "inscriptions";

        try {
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
        ?>
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Prise de rendez-vous médical</h1>

    <div>
        <label for="centres" class="block text-sm font-medium text-gray-700 mb-2">cabinet Médical</label>
        <select id="centres" name="centre" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <?php
            if (isset($cabinetsMedical)) {
                foreach ($cabinetsMedical as $cabinetMedical) {
                    echo "<option value='" . htmlspecialchars($cabinetMedical['id']) . "'>" . htmlspecialchars($cabinetMedical['nom']) . "</option>";
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
    <div>
        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes supplémentaires (optionnel)</label>
        <textarea id="notes" name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>

    <!-- Bouton de soumission -->
    <div>
        <button type="submit" class="w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Prendre rendez-vous
            <!-- insert into rdv(id_medecin,id_cabinetMedical,id_examen,id_patient,date) VALUES(Dr Robert,clinique du bois,echographie,dupont eric,'2024-12-25 11:00:00');  -->
        </button>
    </div>


    </form>
    </div>
</body>

</html>