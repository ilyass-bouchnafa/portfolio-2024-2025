<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Authentification</title>
    <style>
    
</style>
</head>
<body>
    
    <?php 
        if(isset($_SESSION['ErrMss'])) {
            echo "<div id='errMss'>";
            echo $_SESSION['ErrMss']; 
            unset($_SESSION['ErrMss']); //Vider le message d’erreur après l’avoir affiché Sinon, le message peut rester affiché même après un succès si l’utilisateur revient sur la page.
            echo "</div>";
        }
    ?>
    
    <form method="POST" action="traitement.php">
        <input type="text" name="username" id="username" placeholder="username"><br>
        <input type="password" name="password" id="password" placeholder="password"><br>
        <input type="submit" value="LOGIN">
        <p>Not registered? <a href="#">Create an account</a></p>
    </form>
    
</body>
</html>