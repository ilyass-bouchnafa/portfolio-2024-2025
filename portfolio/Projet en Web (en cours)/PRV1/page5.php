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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
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
                <a href="login.html" id="b1" >Login</a>
                <a href="signup.html" id="b2">Signup</a>
            </div>    
        </div>
        <nav>
            <ul>
                <li><a href="acceuil.html">Accueil</a></li>
                <li><a href="espaceetudiant.php">Espace Etudiant</a></li>
                <li><a href="espace_enseignant.html">Espace Enseignant</a></li>
                <li><a href="">Espace Administrateur</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </header>


    <section class="stats-section" id="statistiques">
        <h1>Statistiques</h1>
        <div class="stats-container">
           <div class="stat-card">
             <h2 class="counter">0</h2>
             <p>Étudiants</p>
          </div>
        <div class="stat-card">
              <h2 class="counter">0</h2>
              <p>Enseignants</p>
        </div>
        <div class="stat-card">
          <h2 class="counter">0</h2>
          <p>Nombre de projet</p>
        </div>
        <div class="stat-card">
          <h2 class="counter">0</h2>
          <p>Nombre de module</p>
        </div>
    </section>


    <main class="contenu-enseignant">
        <h1>Liste des Projets Étudiants</h1>
        <a href="">Supprimer</a>
        <select script="position: absolute; right: 0;">
            <option>Etudiant</option>
            <option>Enseignant</option>
        </select>
        

      
        <table class="table-projets" border="1">
          <thead>
            <tr>
                <th></th>
                <th>Étudiant</th>
                <th>N°Apogee</th>
                <th>Email Institutionelle</th>
                <th>Historique de Projet</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><input type="checkbox"></td>
                <td>Fatima Zahra B.</td>
                <td>1234567</td>
                <td>fatima@gmail.com</td>
                <td>historique</td>
                <td><a href="modifier.php">Modifier</a></td>
                
              </td>
            </tr>
          </tbody>
        </table>
      </main>
    


























    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h1>Liens utiles</h1>
                <ul>
                    <li><a href="acceuil.html">Accueil</a></li>
                    <li><a href="espaceetudiant.php">Espace Etudiant</a></li>
                    <li><a href="espace_enseignant.html">Espace Enseignant</a></li>
                    <li><a href="">Espace Administrateur</a></li>
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