<?php 
    session_start(); 

    if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
        $userIdSession = $_SESSION['user_id'];
        if (!isset($_GET['id']) || $_GET['id'] != $userIdSession) {
            header("Location: acceuil.php?id=" . $userIdSession);
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <header>

        <div class="top-bar">
            <a href=""><img src="icons/logoensa.png" alt="LogoENSA"></a>
            <div id="search-bar">
                <input  type="search" placeholder="Rechercher...">
                <img id="loupe" src="icons/loupe.png">
            </div>
            

            <div class="boutton">
                <?php if (!isset($_SESSION['user']) || !isset($_SESSION['user_id'])) { ?>
                    <a href="login.php" id="b1" >Login</a>
                    <a href="signup.php" id="b2">Signup</a>
                <?php } else { ?>
                    <a href="deconnexion.php" id="b3" >Logout</a>
                <?php } ?>
            </div>     
        </div>
        <nav>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="<?php 
	                            if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
                                    if($_SESSION['user'] == 'etudiant' || $_SESSION['user'] == 'administrateur') {
		                                echo "test.php?id=" . $_SESSION['user_id'];
	                                } else { echo ''; }
                                }
                            ?>">Espace Etudiant</a></li>
                <li><a href="<?php 
	                            if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
                                    if($_SESSION['user'] == 'enseignant' || $_SESSION['user'] == 'administrateur') {
		                            echo "test.php?id=" . $_SESSION['user_id'];
	                                } else { echo ''; }
                                }
                            ?>">Espace Enseignant</a></li>
                <li><a href="<?php 
	                            if (isset($_SESSION['user']) && isset($_SESSION['user_id']) && $_SESSION['user'] == 'administrateur') {
		                            echo "page5.php?id=" . $_SESSION['user_id'];
	                                } else { echo ''; }
                            ?>">Espace Administrateur</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </header>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h1>Liens utiles</h1>
                <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="<?php 
	                            if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
                                    if($_SESSION['user'] == 'etudiant' || $_SESSION['user'] == 'administrateur') {
		                                echo "test.php?id=" . $_SESSION['user_id'];
	                                } else { echo ''; }
                                }
                            ?>">Espace Etudiant</a></li>
                <li><a href="<?php 
	                            if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
                                    if($_SESSION['user'] == 'enseignant' || $_SESSION['user'] == 'administrateur') {
		                            echo "test.php?id=" . $_SESSION['user_id'];
	                                } else { echo ''; }
                                }
                            ?>">Espace Enseignant</a></li>
                <li><a href="<?php 
	                            if (isset($_SESSION['user']) && isset($_SESSION['user_id']) && $_SESSION['user'] == 'administrateur') {
		                            echo "test.php?id=" . $_SESSION['user_id'];
	                                } else { echo ''; }
                            ?>">Espace Administrateur</a></li>
                <li><a href="">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h1>Formation</h1>
                <ul>
                    <li><a href="">Formation initiale</a></li>
                    <li><a href="">Formation continue</a></li>
                    <li><a href="">Accès à la recherche Inscription</a></li> 
                </ul>
            </div>
            <div class="footer-section">
                <h1>Réseaux Sociaux</h1>
                <div class="footer-socials">
                    <a href="#"><img src="icons/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="icons/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="icons/X.png" alt="X"></a>
                    <a href="#"><img src="icons/github.png" alt="GitHub"></a>
                </div>
            </div>
        </div>
        <p class="footer-bottom">École Nationale des Sciences Appliquées &copy; 2025 Université Ibn Tofail. All Rights Reserved</p>
    </footer>

</body>
</html>

   
