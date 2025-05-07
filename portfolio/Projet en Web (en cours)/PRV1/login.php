<?php session_start(); ?>
<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Connexion</title>
</head>
<body>
    
    <?php 
        if(isset($_SESSION['errors']['connexion'])) { 
            echo '<div class="errLogin">' . $_SESSION['errors']['connexion'] . '</div>'; 
            unset($_SESSION['errors']['connexion']);
            if (empty($_SESSION['errors'])) {
                unset($_SESSION['errors']);
            }
        } 
    ?>

    <div class="ensalogo"> 
        <a href=""><img src="icons/logoensa.png" alt="logoEnsa"></a>
    </div>
    <div class="container">
        <div class="container-img">
            <img src="image/ensa-image.jpg" alt="ensa-image">
        </div>
        <div class="container-form">
            <h1>Connexion</h1>
            <div class="login-container">
                <form method="POST" action="connexion.php">
                    <div class="login-form">
                        <div class="email-container">
                            <div class="login-form-email">
                                <img src="icons/email.png" alt="iconEmail">
                                <input type="text" name="email" placeholder="Email">
                            </div>
                            <?php if(isset($_SESSION['errors']['email'])) { 
                                echo '<div class="errMss">' . $_SESSION['errors']['email'] . '</div>'; 
                                unset($_SESSION['errors']['email']);
                                if (empty($_SESSION['errors'])) {
                                    unset($_SESSION['errors']);
                                }
                            } ?>
                        </div>
                        <div class="password-container">
                            <div class="login-form-password">
                                <img src="icons/lock.png" alt="iconLock">
                                <input type="password" name="password" placeholder="Mot de passe">
                            </div>
                            <?php if(isset($_SESSION['errors']['password'])) { 
                                echo '<div class="errMss">' . $_SESSION['errors']['password'] . '</div>'; 
                                unset($_SESSION['errors']['password']);
                                if (empty($_SESSION['errors'])) {
                                    unset($_SESSION['errors']);
                                }
                            } ?>
                        </div>
                        <a href="https://www.youtube.com/">Mot de passe oublié ?</a>
                        <input type="submit" value="Connexion">
                    </div>
                </form>
            </div>
            <div class="container-bottom">
                <p>Pas encore inscrit ? <a href="signup.php">Inscription</a></p>
                
            </div>
        </div>
        
    </div>
</body>
</html>
