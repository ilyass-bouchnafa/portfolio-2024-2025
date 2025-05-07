<?php
    $nom = "  BOUCHNAFA  "; 
    $prenom = "ilyass "; 
    $email = "ilyass.Bouchnafa@uic.ac.ma"; 
    $formation = "Génie informatique"; 
    $date_naissance = "11/07/2004"; 

    //Partie 1 :
    //1
    $nom = trim($nom);
    $prenom = trim($prenom);
    $nom = strtolower($nom);
    $nom = ucfirst($nom);
    $prenom = ucfirst($prenom);
    echo "$prenom $nom <br>";
    //2
    $email = strtolower($email);
    //3
    if (strpos($email, "@")) {
        echo "$email <br>";
    } else {
        echo "Adresse E-mail incorrect !!";
    }
    //4
    $date = explode("/", $date_naissance);
    $date_naissance = implode("-", $date); 
    echo "$date_naissance <br>";

    //partie 2 :
    //5
    echo 'Le nombre de caractères dans $formation est :' . strlen($formation) . '<br>';
    echo 'Le nombre de mots dans $formation est : ' . str_word_count($formation) - 1 . '<br>';
    $formation = ucwords($formation);
    $formationMots = str_word_count($formation, 1, 'é');
    echo substr($formationMots[0], 0, 1) . "." . substr($formationMots[1], 0, 1) . '<br>';
    //6
    $nom = strtoupper($nom);
    $cle = substr($nom, 0, 3) . $date[2] . substr($formationMots[0], 0, 1) . substr($formationMots[1], 0, 1);
    echo $cle;
    //7
    $nom = addslashes($nom);
    $prenom = addslashes($prenom);
    $email = addslashes($email);
    $formation = addslashes($formation);
    $date_naissance = addslashes($date_naissance);

    $sql = "INSERT INTO etudiants (nom, prenom, email, formation, date_naissance) VALUES ('$nom', '$prenom', '$email', '$formation', '$date_naissance')";
?>