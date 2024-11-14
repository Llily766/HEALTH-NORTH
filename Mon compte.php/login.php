<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Document</title>
</head>

    <body>
    <form action="testConnexion.php" method="POST">
            <label for="username">login</label>
            <input type="text" id="login" name="login" required>

             <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se connecter">

    </form>
    </body>
</html>