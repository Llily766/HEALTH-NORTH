<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">


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
        $stmt = $conn->prepare("SELECT * FROM cabinetsmedicaux ORDER BY nom");
        $stmt->execute();
        
        // Récupération des résultats
        $centres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch(PDOException $e) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Erreur!</strong>
                <span class='block sm:inline'> Impossible de se connecter à la base de données: " . $e->getMessage() . "</span>
              </div>";
    }



    ?>

</head>
<body>
   
    <div class="container">   
   <div class="topnav">
    <a  href="quiSommesNous.php">Qui sommes-nous?</a>
    <a href="carte.php">Contact</a>
    <a class="personne.php">Se Connecter</a>
    <a href="lien.php">Creer un compte</a>
    <a href="Centres.php">Liste des centres</a>
    
   </div>
   <img src="assets/labo.jpg "width="900px"heignt='200px'>

    
   <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Prise de rendez-vous médical</h1>
        
        <form class="space-y-6">
            <!-- Sélection du centre -->
            <div>
                <label for="centre" class="block text-sm font-medium text-gray-700 mb-2">Centre médical</label>
                <select id="centre" name="centre" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Sélectionnez un centre</option>
                    <?php
                        if (isset($centres)) {
                            foreach($centres as $centre) {
                            echo "<option value='" . htmlspecialchars($centre['id']) . "'>".htmlspecialchars($centre['nom']) . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>

            <!-- Sélection du médecin -->
            <div>
                <label for="medecin" class="block text-sm font-medium text-gray-700 mb-2">Médecin</label>
                <select id="medecin" name="medecin" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Sélectionnez un médecin</option>
                    <option value="med1">Dr. Martin</option>
                    <option value="med2">Dr. Dubois</option>
                    <option value="med3">Dr. Bernard</option>
                    <option value="med4">Dr. Robert</option>
                  
                </select>
            </div>

            <!-- Sélection de la date -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date et heure du rendez-vous</label>
                <input type="datetime-local" id="date" name="date" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Raison du rendez-vous -->
            <div>
                <label for="raison" class="block text-sm font-medium text-gray-700 mb-2">Raison du rendez-vous</label>
                <select id="raison" name="raison" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Sélectionnez une raison</option>
                    <option value="sang">Prise de sang</option>
                    <option value="scanner">Scanner</option>
                    <option value="irm">IRM</option>
                    <option value="consultation">Consultation générale</option>
                    <option value="radio">Radiographie</option>
                    <option value="echographie">Échographie</option>
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
                </button>
            </div>
     

        </form>
    </div>

    </div>
</body>
</html>