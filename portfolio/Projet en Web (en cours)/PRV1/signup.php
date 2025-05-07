<?php session_start(); ?>
<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Connexion</title>
</head>
<body>
    <div class="ensalogo">
        <a href=""><img src="icons/logoensa.png" alt="logoEnsa"></a>
    </div>

    <?php if(isset($_SESSION['db_error'])) { 
        echo '<div class="error">' . $_SESSION['db_error'] . '</div>';  
        unset($_SESSION['db_error']);
        } 
    ?>

    <?php if(isset($_SESSION['success'])) { 
        echo '<div class="success">' . $_SESSION['success'] . '</div>';  
        unset($_SESSION['success']);
        } 
    ?>



    <div class="container">
        <div class="container-img">
            <img src="image/ensa-image2.jpg" alt="ensa-image">
        </div>
        <div class="container-form">
            <h1>Inscription</h1>
            <div class="login-container">
                <div class="login-form">
                    <form method="POST" action="fillData.php">
                        <div class="login-form-nom">
                            <input type="text" name="nom" placeholder="Nom" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>">
                            <?php if (isset($_SESSION['erreurs']['nom'])) { ?>
                                <div class="errorMss">
                                    <?php echo $_SESSION['erreurs']['nom']; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="login-form-prenom">
                            <input type="text" name="prenom" placeholder="Prenom" value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>">
                            <?php if (isset($_SESSION['erreurs']['prenom'])) { ?>
                                <div class="errorMss">
                                    <?php echo $_SESSION['erreurs']['prenom']; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="login-form-apogee">
                            <input type="text" name="apogee" placeholder="N° Apogee" value="<?php echo isset($_POST['apogee']) ? htmlspecialchars($_POST['apogee']) : ''; ?>">
                            <?php if (isset($_SESSION['erreurs']['apogee'])) { ?>
                                <div class="errorMss">
                                    <?php echo $_SESSION['erreurs']['apogee']; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="login-form-password">
                            <input type="password" name="password" placeholder="Mot de passe">
                            <?php if (isset($_SESSION['erreurs']['password'])) { ?>
                                <div class="errorMss">
                                    <?php echo $_SESSION['erreurs']['password']; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="login-form-passwordconfirm">
                            <input type="password" name="passwordconfirm" placeholder="Confirmer le mot de passe">
                            <?php if (isset($_SESSION['erreurs']['passwordconfirm'])) { ?>
                                <div class="errorMss">
                                    <?php echo $_SESSION['erreurs']['passwordconfirm']; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <input type="submit" value="S'inscrire">
                    </form>
                </div>
                
            </div>
            <div class="container-bottom">
                <p>Déjà inscrit ? <a href="login.php">Connexion</a></p>
                
            </div>
        </div>
        
    </div>
     
</body>
</html>
