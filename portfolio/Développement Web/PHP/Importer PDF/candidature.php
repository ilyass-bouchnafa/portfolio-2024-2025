<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 40px;
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin-top: 5%;
        }
        form {
            background-color: white;
            width: 380px;
            border: 1px solid black;
            padding: 30px 45px;
            border-style: none;
            box-shadow: 2px 2px 5px gray;
        }
        input[name="nom"], input[name="prenom"], input[name="email"], select, input[name="fichier"], #nvE {
            width: 95%;
            padding: 6px;
            margin: 4px 0 2px 0;

        }
        input[name="valider"] {
            width: 100%;
            padding: 6px;
            margin-top: 10px;
        }
        .champ {
            margin-top: 10px;
        }
        
        .errorMsg {
            font-size: 14px;
            font-weight: bold;
            color: darkred;
        }
        label {
            font-weight: bold;
        }

        input[name="valider"] {
            background-color: lightblue;
            color: white;
            font-size: 18px;
            font-weight: 500;
            border-style: none;
            cursor: pointer;
        }
        input[name="valider"]:hover {
            opacity: 0.8;
        }
        #result {
            background-color: lightgreen;
            width: 300px;
            padding: 20px 30px;
        }
      
    </style>
    
</head>
<body>
        <?php 
        // Champs obligatoires
        $nomErr = $prenomErr = $emailErr = $filiereErr = $nvErr = $fichierErr = "";
        if(isset($_POST['valider'])) {
            if(empty($_POST['nom'])) {
                $nomErr = "Ce champ est obligatoire !!";
            }
            if(empty($_POST['prenom'])) {
                $prenomErr = "Ce champ est obligatoire !!";
            }
            if(empty($_POST['email'])) {
                $emailErr = "Ce champ est obligatoire !!";
            }
            if(empty($_POST['filiere'])) {
                $filiereErr = "Ce champ est obligatoire !!";
            }
            if(empty($_POST['niveauEtude'])) {
                $nvErr = "Ce champ est obligatoire !!";
            }
        }

        // Condition sur le fichier
        $fichierErr = '';
        if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === 0) {
            $nomF = $_FILES['fichier']['name'];
            $tmp = $_FILES['fichier']['tmp_name'];
            $taille = $_FILES['fichier']['size'];
            $ext = strtolower(string: pathinfo(path: $nomF, flags: PATHINFO_EXTENSION));
            $autorisée = 'pdf';
            $max = 1024 * 1024; // 1 Mo
            if ($ext !== $autorisée) {
                $fichierErr = "Extension non autorisée.";
            } elseif ($taille > $max) {
                $fichierErr = "Fichier trop grand.";
            } else {
                move_uploaded_file(from: $tmp, to: "uploads/" . $nomF);
                $fichierErr = "Fichier télécharger avec succés.";
            }
        } 


                
    ?>
    <form method="POST" action="#" enctype="multipart/form-data">
        <div class="champ">
            <label for="nom">Nom : </label><br>
            <input type="text" name="nom" id="nom" value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>"><span class="errorMsg"><?php echo $nomErr; ?></span>
        </div>
        <div class="champ">
            <label for="prenom">Prenom : </label><br>
            <input type="text" name="prenom" id="prenom" value="<?php if (isset($_POST['prenom']))  echo $_POST['prenom']; ?>" ><span class="errorMsg"><?php echo $prenomErr; ?></span>
        </div>
        <div class="champ">
            <label for="email">Email : </label><br>
            <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))  echo $_POST['email']; ?>" ><span class="errorMsg"><?php echo $emailErr; ?></span>
        </div>
        <div class="champ">
            <label for="filiere">Filière : </label><br>
            <select name="filiere">
                <option value="" selected disabled>-- Choisir une filière --</option>
                <option value="GI" <?php if (isset($_POST['filiere']) && $_POST['filiere'] == 'GI') echo 'selected'; ?>>Génie Informatique</option>
                <option value="GE" <?php if (isset($_POST['filiere']) && $_POST['filiere'] == 'GE') echo 'selected'; ?>>Génie Electrique</option>
                <option value="GIND" <?php if (isset($_POST['filiere']) && $_POST['filiere'] == 'GIND') echo 'selected'; ?>>Génie Industriel</option>
                <option value="RST" <?php if (isset($_POST['filiere']) && $_POST['filiere'] == 'RST') echo 'selected'; ?>>Génie Reseaux et Système de Telecomunication</option>
                <option value="GM" <?php if (isset($_POST['filiere']) && $_POST['filiere'] == 'GM') echo 'selected'; ?>>Génie Mécatronique</option>
            </select><br><span class="errorMsg"><?php echo $filiereErr; ?></span>
        </div>
        <div class="champ">
            <label for="niveauEtude">Niveau d'études : </label><br>
            <div id="nvE">
                <input type="radio" name="niveauEtude" id="niveauEtude" value="1" <?php if (isset($_POST['niveauEtude']) && $_POST['niveauEtude'] == '1') echo 'checked'; ?>> 1er Année
                <input type="radio" name="niveauEtude" id="niveauEtude" value="2" <?php if (isset($_POST['niveauEtude']) && $_POST['niveauEtude'] == '2') echo 'checked'; ?>> 2eme Année
                <input type="radio" name="niveauEtude" id="niveauEtude" value="3" <?php if (isset($_POST['niveauEtude']) && $_POST['niveauEtude'] == '3') echo 'checked'; ?>> 3eme Année
                <br><span class="errorMsg"><?php echo $nvErr; ?></span>
            </div>
            <br>
        </div>
        <div>
            <label for="fichier">Fichier PDF : </label><br>
            <input type="file" name="fichier" id="fichier"><br>
            <span class="errorMsg"><?php echo $fichierErr; ?></span>
        </div>
        <input type="submit" name="valider" value="Valider">
        <br>
    </form>
    <div id="result">
        <?php
            if (isset($_POST['valider'])) {
                if (isset($_POST['nom']) && !empty($_POST['nom'])) {
                    echo "✔ Nom bien saisi <br>";
                }
                if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
                    echo "✔ Prenom bien saisi <br>";
                }
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    echo "✔ Email bien saisi <br>";
                }
                if (isset($_POST['filiere'])) {
                    echo "✔ Filière bien entrée <br>";
                }
                if (isset($_POST['niveauEtude'])) {
                    echo "✔ Niveau d'étude bien saisi <br>";
                }
                if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === 0) {
                    echo "✔ Fichier bien reçu <br>";
                }
            }
        ?> 
    </div>  
</body>
</html>