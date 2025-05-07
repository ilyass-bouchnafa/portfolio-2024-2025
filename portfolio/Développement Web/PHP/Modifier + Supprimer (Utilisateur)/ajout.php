<?php
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $filiere = htmlspecialchars($_POST['filiere']);
        
        $add = $db->prepare("INSERT INTO etudiants (nom, prenom, email, filiere) VALUES (:nom, :prenom, :email, :filiere)");

        if (isset($nom) && isset($prenom) && isset($email) && isset($filiere)) {
            if ($nom !== '' && $prenom !== '' && $email !== '' && $filiere !== '' ) {
                $add->execute([
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':email' => $email,
                    ':filiere' => $filiere
                ]);
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
    <title>Formulaire</title>
</head>
<body>
    <h1>Ajouter un étudiant</h1>
    <form method="POST" action="#">
        <input type="text" name="nom" id="nom" placeholder="Nom"><br>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom"><br>
        <input type="text" name="email" id="email" placeholder="Email"><br>
        <input type="text" name="filiere" id="filiere" placeholder="Filiere"><br>
        <input type="submit" value="Valider"><br>
    </form>
    <a href="liste.php">Voir la liste</a>
</body>
</html>

