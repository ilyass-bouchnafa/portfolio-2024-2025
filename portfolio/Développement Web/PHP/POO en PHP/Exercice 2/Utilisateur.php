<?php  
	class Utilisateur {
		private $id;
		private $nom;
		private $email;
		private $role;
		private $listeUsers = []; // ?

		/* setter */
		public function setId($id) {
			$this->id = $id;
		}
		public function setNom($nom) {
			$this->nom = $nom;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function setRole($role) {
			if ($role === "etudiant" || $role === "enseigant") {
				$this->role = $role;
			}
			else $this->role = null;
		}

		/* getter */
		public function getId() {
			return $this->id;
		}
		public function getName() {
			return $this->nom;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getRole() {
			return $this->role;
		}

		/* Fonction d'affichage */

		public function afficherProfil() {
			echo "[$this->id] -- [$this->nom] -- [$this->email] -- [$this->role] <br>";
		}

		/* Stocker les utilisateurs dans une liste */

		public function stockUsers(Utilisateur $user) {
			$this->listeUsers[] = $user;
		}

		/* Afficher les utilisateurs ayant le role enseignant */

		public function afficherListeEns() {
			foreach ($this->listeUsers as $user) {
				if ($user->role === "enseigant") {
					echo "[$user->id] -- [$user->nom] -- [$user->email] -- [$user->role] <br>";
				}
			}
		}

		/* Trouver utilisateur avec ID */

		public function  trouverUtilisateurParId($id) {
			foreach ($this->listeUsers as $user) {
				if ($user->id === $id) {
					echo "[$user->id] -- [$user->nom] -- [$user->email] -- [$user->role] <br>";
				}
			}
		}

		public static function validerEmail($email) {
			return filter_var($email, FILTER_VALIDATE_EMAIL);
		}
	}
?>

