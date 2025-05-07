<?php 
    session_start();

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'projet');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $db = new PDO($dsn, DB_USER, DB_PASS, $option);
    } catch(PDOException $e) {
        $_SESSION['db_error'] = "Échec de la connexion : " . $e->getMessage();
        header("Location: signup.php");
    }

    
    
    $_SESSION['erreurs'] = [];
    $donnees_valides = true;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validation du nom
        if (empty($_POST['nom'])) {
            $_SESSION['erreurs']['nom'] = "Ce champ est obligatoire !";
            $donnees_valides = false;
        } elseif (!preg_match("/^[a-zA-Z-']+$/", trim($_POST['nom']))) {
            $_SESSION['erreurs']['nom'] = "Veuillez respecter le format du nom (A-Z, a-z, ' ou -)";
            $donnees_valides = false;
        } else {
            $nom = htmlspecialchars(trim($_POST['nom']));
        }
        // Validation du prenom
        if (empty($_POST['prenom'])) {
            $_SESSION['erreurs']['prenom'] = "Ce champ est obligatoire !";
            $donnees_valides = false;
        } elseif (!preg_match("/^[a-zA-Z-']+$/", trim($_POST['prenom']))) {
            $_SESSION['erreurs']['prenom'] = "Veuillez respecter le format du prenom (A-Z, a-z, ' ou -)";
            $donnees_valides = false;
        } else {
            $prenom = htmlspecialchars(trim($_POST['prenom']));
        }
        // Validation du numéro d'apogee
        if (empty($_POST['apogee'])) {
            $_SESSION['erreurs']['apogee'] = "Ce champ est obligatoire !";
            $donnees_valides = false;
        } elseif (!preg_match("/^[0-9]{8}$/", trim($_POST['apogee']))) {
            $_SESSION['erreurs']['apogee'] = "Veuillez respecter le format du numero d'apogee (8 chiffres)";
            $donnees_valides = false;
        } else {
            $apogee = htmlspecialchars(trim($_POST['apogee']));
        }
        // Validation du mot de passe 
        if (empty($_POST['password'])) {
            $_SESSION['erreurs']['password'] = "Ce champ est obligatoire !";
            $donnees_valides = false;
        } elseif (strlen(trim($_POST['password'])) < 8) {
            $_SESSION['erreurs']['password'] = "Le mot de passe doit contenir au moins 8 caractères";
            $donnees_valides = false;
        } else {
            $password = htmlspecialchars(trim($_POST['password']));
        }
        // Validation de la confirmation de mot de passe 
        if (empty($_POST['passwordconfirm'])) {
            $_SESSION['erreurs']['passwordconfirm'] = "Ce champ est obligatoire !";
            $donnees_valides = false;
        } elseif (isset($password) && $password !== htmlspecialchars(trim($_POST['passwordconfirm']))) {
            $_SESSION['erreurs']['passwordconfirm'] = "Le mot de passe ne correspondent pas";
            $donnees_valides = false;
        }
        
        if ($donnees_valides) {
            try {
                // Preparation de la requette SQL
                $sql = "INSERT INTO etudiants (apogee, nom, prenom, email, mdp) VALUES (:apogee, :nom, :prenom, :email, :mdp);";
                $add = $db->prepare($sql);

                $email = strtolower($prenom) . "." . strtolower($nom) . "@uit.ac.ma";

                $add->execute([
                    ':apogee' => $apogee,
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':email' =>  $email,
                    ':mdp' => password_hash($password, PASSWORD_DEFAULT)
                ]);

                $_SESSION['success'] = "Inscription réussie !";

            } catch(PDOException $e) {
                $_SESSION['erreurs']['db'] = "Erreur lors de l'insertion : " . $e->getMessage();
            }
        }

        header("Location: signup.php");
        exit();
    }
    
?>