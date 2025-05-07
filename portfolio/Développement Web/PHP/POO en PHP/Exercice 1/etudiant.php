<?php
require_once 'utilisateur.php';

class Etudiant extends Utilisateur {
    private $code_massar;
    private $filiere;
    private $note;

    public function __construct($nom, $prenom, $code_massar, $filiere, $note) {
        parent::__construct($nom, $prenom);
        $this->code_massar = $code_massar;
        $this->filiere = $filiere;
        $this->note = $note;
    }

    public function getCodeMassar() {
        return $this->code_massar;
    }

    public function setCodeMassar($code_massar) {
        $this->code_massar = $code_massar;
    }

    public function getFiliere() {
        return $this->filiere;
    }

    public function setFiliere($filiere) {
        $this->filiere = $filiere;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function afficherProfil() {
        parent::afficherProfil();
        echo " - Massar : {$this->code_massar} - Filière : {$this->filiere} - Note : {$this->note}<br>";
    }
}
?>
