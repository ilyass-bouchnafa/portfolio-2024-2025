<?php 
    session_start();
    define("DB_HOST", "localhost");
    define("DB_NAME",  "ensa");
    define("DB_USER", "root");
    define("DB_PASS", "");
    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    try {
        $db = new PDO($dsn, DB_USER, DB_PASS, $option);
        
    } catch(PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
        exit();
    }

    $id = null;
    if (isset($_SESSION['id'])) {
        $id = (int)$_SESSION['id'];
    }

    $query = $db->prepare("SELECT * FROM etudiants WHERE id = :id");
    $query->execute(['id' => $id]);
    $etudiant = $query->fetch(PDO::FETCH_ASSOC);


    $errMss = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['filiere'])) {
            if ($_POST['nom'] != '' && $_POST['prenom'] != '' && $_POST['email'] != '' && $_POST['filiere'] != '') {

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $filiere = htmlspecialchars($_POST['filiere']);

                $sql = "UPDATE etudiants SET nom = :nom, prenom = :prenom, email = :email, filiere = :filiere WHERE id = :id";
                $mod = $db->prepare($sql);

                $mod->execute([
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':email' => $email,
                    ':filiere' => $filiere,
                    ':id' => $id

                ]);
                header("Location: liste.php");
                exit();
            } else {
                $errMss = "Veuillez remplir tous les champs !!";
            }
        }     

    }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleform.css">
    
    <title>Modifier</title>
</head>
<body>  
    <h1>Modifier un étudiant</h1>
    <form method="POST" action="">
        <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>"><br>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>"><br>
        <input type="text" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($etudiant['email']); ?>"><br>
        <input type="text" name="filiere" id="filiere" placeholder="Filiere" value="<?php echo htmlspecialchars($etudiant['filiere']); ?>"><br>
        <input type="submit" value="Valider"><br>
        <span class="errMss"><?php echo "$errMss"; ?></span>
    </form>
    <a href="liste.php">Retour à la liste</a>

</body>
</html>