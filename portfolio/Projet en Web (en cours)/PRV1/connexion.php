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
        header("Location: login.php");
        exit();
    }
    
    $donnees_valides = true;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(empty($_POST['email'])) {
            $_SESSION['errors']['email'] = "Le champ email est obligatoire !";
            $donnees_valides = false;
        } elseif (!preg_match("/^[a-zA-Z0-9-.]+@uit\.ac\.ma$/", $_POST['email'])) {
            $_SESSION['errors']['email'] = "Entrez l'email selon le bon format (@uit.ac.ma)";
            $donnees_valides = false;
        } else {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        }

        if(empty($_POST['password'])) {
            $_SESSION['errors']['password'] = "Le champ mot de passe est obligatoire !";
            $donnees_valides = false;
        } else {
            $password = $_POST['password'];
        }

        if ($donnees_valides) {
            try {
                $conn = $db->prepare("SELECT * FROM etudiants WHERE email = :email");
                $conn->execute([':email' => $email]);
                $row = $conn->fetch(PDO::FETCH_ASSOC);

                if ($row && password_verify($password, $row['mdp'])) {
                    $_SESSION['user'] = 'etudiant';
                    $_SESSION['user_id'] = $row['apogee'];
                    header("Location: acceuil.php?id=" . $row['apogee']);
                    exit();
                }
                
                $connE = $db->prepare("SELECT * FROM enseignants WHERE emailE = :email");
                $connE->execute([':email' => $email]);
                $rowE = $connE->fetch(PDO::FETCH_ASSOC);

                if($rowE && password_verify($password, $rowE['mdpE'])) {
                    $_SESSION['user'] = 'enseignant';
                    $_SESSION['user_id'] = $rowE['idE'];
                    header("Location: acceuil.php?id=" . $rowE['idE']);
                    exit();
                }
                
                $connA = $db->prepare("SELECT * FROM administrateur WHERE emailA = :email");
                $connA->execute([':email' => $email]);
                $rowA = $connA->fetch(PDO::FETCH_ASSOC);
                
                if ($rowA && password_verify($password, $rowA['mdpA'])) {
                    $_SESSION['user'] = 'administrateur';
                    $_SESSION['user_id'] = $rowA['idA'];
                    header("Location: acceuil.php?id=" . $rowA['idA']);
                    exit();
                }
                
                $_SESSION['errors']['connexion'] = "Mot de passe ou utilisateur introuvable !";
                header("Location: login.php");
                exit();
            } catch(PDOException $e) {
                $_SESSION['errors']['sql'] = 'Problème : ' . $e->getMessage();
                header("Location: login.php");
                exit();
            }
        } else {
            header("Location: login.php");
            exit();
        }
    }
?>