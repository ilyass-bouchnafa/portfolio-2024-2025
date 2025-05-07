<?php 
	require_once 'Utilisateur.php';
	$user1 = new Utilisateur();
	$user1->setId(1);
	$user1->setNom("ilyass");
	$user1->setEmail("ilyass@gmail.com");
	$user1->setRole("etudiant");

	// $user1->afficherProfil();

	$user2 = new Utilisateur();
	$user2->setId(2);
	$user2->setNom("ahmed");
	$user2->setEmail("ahmed@gmail.com");
	$user2->setRole("etudiant");

	$user3 = new Utilisateur();
	$user3->setId(3);
	$user3->setNom("sara");
	$user3->setEmail("sara@gmail.com");
	$user3->setRole("etudiant");

	$user4 = new Utilisateur();
	$user4->setId(4);
	$user4->setNom("morad");
	$user4->setEmail("morad@gmail.com");
	$user4->setRole("enseigant");

	$user5 = new Utilisateur();
	$user5->setId(5);
	$user5->setNom("hamid");
	$user5->setEmail("hamid@gmail.com");
	$user5->setRole("enseigant");

	/* Stocker dans la liste des utilisateurs */

	$user1->stockUsers($user1);
	$user1->stockUsers($user2);
	$user1->stockUsers($user3);
	$user1->stockUsers($user4);
	$user1->stockUsers($user5);

	$user1->afficherListeEns($user1);

	/* Trouver un utilisateur */

	$user1->trouverUtilisateurParId(1);

	/* Vérifier la validation de l'email */

	if (Utilisateur::validerEmail($user1->getEmail())) {
		echo "L'email est valide !! <br>";
	}
	else {
		echo "L'email est invalide !! <br>";
	}







?>