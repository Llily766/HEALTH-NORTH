<?php
// Gestion du processus d'inscription
session_start();

$servername = "192.168.1.15";
$username = "healthnorth";

$password = "healthnorth-password";

$dbname = "inscriptions";

try {
    // Connexion PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Traitement du formulaire
$erreur = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupération et nettoyage des données
        $nom = htmlspecialchars(trim($_POST['nom']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

        
        // Vérification si l'email existe déjà
        $stmt = $pdo->prepare("SELECT id_patient FROM patient WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        if ($stmt->rowCount() > 0) {
            $erreur = "Cet email est déjà utilisé";
        } else {
            // Préparation de la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO patient (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)");
            
            // Exécution de la requête
            $resultat = $stmt->execute([
                ':nom' => $nom,
                ':email' => $email,
                ':mot_de_passe' => $mot_de_passe
            ]);
            

            if ($resultat) {
                $_SESSION['inscription_reussie'] = true;
                header("Location: index.php");
                exit();
            } else {
                $erreur = "Erreur lors de l'inscription";
            }
      

        }
    } catch (PDOException $e) {
        $erreur = "Erreur de base de données : " . $e->getMessage();
    }
}

?>