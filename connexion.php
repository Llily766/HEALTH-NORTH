<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion</title>
</head>
<body>
<div class="container">
<h2>Connnexion</h2>
<form action="inscription.php" method="POST">

<label for="email">Email</label>
<input type="email" id="email" name="email" required>

<label for="password">Mot de passe</label>
<input type="password" id="password" name="password" required>

<input type="submit" value="S'inscrire">
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connexion";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$user = $_POST['username'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

// Insérer les données dans la base
$sql = "INSERT INTO utilisateurs (email, mot_de_passe) VALUES ('$user', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
echo "Connexion réussie !";
} else {
echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
}
?>
</body>
</html>

