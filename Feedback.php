<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Responsive Form Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
  

    
    <div class="form-box">
        <div class="textup">
            <i class="fa fa-solid fa-clock"></i>
            çà dure 2 minutes!!
        </div>
        <form>
            <label for="uname">
                <i class="fa fa-solid fa-user"></i>
                Nom
            </label>
            <input type="text" id="uname" name="uname" required>

            <label for="email">
                <i class="fa fa-solid fa-envelope"></i>
                email:
            </label>
            <input type="email" id="email" name="email" required>

            <label for="phone">
                <i class="fa-solid fa-phone"></i>
                téléphone
            </label>
            <input type="tel" id="phone" name="phone" required>

            <label>
                <i class="fa-solid fa-face-smile"></i>
                Etes-vous satifait du service?
            </label>
            <div class="radio-group">
                <input type="radio" id="yes" name="satisfy" value="yes" checked>
                <label for="yes">YES</label>

                <input type="radio" id="no" name="satisfy" value="no">
                <label for="no">NON</label>
            </div>

            <label for="msg">
                <i class="fa-solid fa-comments" style="margin-right: 3px;"></i>
                Vos suggestions
            </label>
            <textarea id="msg" name="msg" rows="4" cols="10" required>
            </textarea>
            <button type="submit">
                Submit
            </button>
        </form>
    </div>
</body>

</html>