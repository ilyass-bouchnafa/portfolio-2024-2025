<?php
require_once 'connexion.php';
require_once 'etudiant.php';

class EtudiantManager {

    private $pdo;

    public function __construct() {
        $this->pdo = Connexion::getConnexion();
    }

    public function ajouter(Etudiant $etudiant) {
        $sql = "INSERT INTO etudiants(nom, prenom, code_massar, filiere, note)
                VALUES (:nom, :prenom, :code_massar, :filiere, :note)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nom'->getNom(),
            ':prenom'->getPrenom(),
            ':code_massar'->getCodeMassar(),
            ':filiere'->getFiliere(),
            ':note'->getNote()
        ]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM etudiants");
        $etudiants = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $etudiants[] = new Etudiant(
                $row['nom'],
                $row['prenom'],
                $row['code_massar'],
                $row['filiere'],
                $row['note']
            );
        }

        return $etudiants;
    }

    public function rechercherParFiliere($filiere) {
        $stmt = $this->pdo->prepare("SELECT * FROM etudiants WHERE filiere = :filiere");
        $stmt->execute([':filiere' => $filiere]);
        $etudiants = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $etudiants[] = new Etudiant(
                $row['nom'],
                $row['prenom'],
                $row['code_massar'],
                $row['filiere'],
                $row['note']
            );
        }

        return $etudiants;
    }

    public function afficherMoyenne() {
        $stmt = $this->pdo->query("SELECT AVG(note) as moyenne FROM etudiants");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['moyenne'];
    }
}
?>
