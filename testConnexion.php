<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connexion à la base de données
        $servername = "192.168.1.15";
        $username = "healthnorth";
        $password = "healthnorth-password";
        $dbname = "inscriptions";

        // Créer la connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        // Récupérer les données du formulaire

        $login = $_POST['login'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

        // Insérer les données dans la base
        $sql = "INSERT INTO patient (nom,prenom,login,adresse, email, mot_de_passe) VALUES ('$user','$prenom','$login','$adresse', '$email', '$pass')";

        //SELECT * from patient where login =   $login and password = $password


        
        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        // Fermer la connexion
        $conn->close();
    }
    ?>