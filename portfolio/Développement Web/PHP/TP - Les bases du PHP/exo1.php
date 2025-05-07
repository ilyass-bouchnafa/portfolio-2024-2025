<?php

    //Question 1
    $contact1 = array("Nom"=>"Bouchnafa", "Prenom"=>"Ilyass", "Email"=>"ilyass.bouchnafa@uit.ac.ma", "NumeroTele"=>"0672567188");
    $contact2 = array("Nom"=>"Zaki", "Prenom"=>"Ahmed", "Email"=>"ahmed123@gmail.com", "NumeroTele"=>"0611557722");
    $contact3 = array("Nom"=>"Adnane", "Prenom"=>"Morade", "Email"=>"Morad@yahoo.fr", "NumeroTele"=>"0688774455");
    $listcontact = array($contact1, $contact2, $contact3);

    //Question 2
    function afficher($contacts) {
        foreach($contacts as $contact) {
            print_r($contact);
            echo "<br>";
        }
    }
    afficher($listcontact); //Question 6

    //Question 3
    function ajouterContact($contacts, $nom, $prenom, $email, $tel) {
        $addContact = array("Nom"=>$nom, "Prenom"=>$prenom, "Email"=>$email, "NumeroTele"=>$tel);
        array_push($contacts, $addContact);
        return $contacts;
    }
    

    $listcontact = ajouterContact($listcontact, "Bennani", "Ali", "Ali2003@gmail.com", "0788442200"); //Question 6
    afficher($listcontact);

    //Question 4
    function chercherContact($contacts, $prenom) {
        foreach($contacts as $contact) { 
            if ($contact["Prenom"] === $prenom) {
                return $contact;
            }
        }
    }

    if (chercherContact($listcontact, "Ali")) { //Question 6
        echo "Le contact existe dans la liste contact : <br>";
        print_r(chercherContact($listcontact, "Ali"));
        echo "<br>";
    }
    else {echo "Contact Introuvable";}

    //Question 5
    function compterContacts($contacts) {
        return count($contacts);
    }

    $nbrContact = compterContacts($listcontact); //Question 6
    echo "Le nombre total de contacts est : $nbrContact";
?>
    

