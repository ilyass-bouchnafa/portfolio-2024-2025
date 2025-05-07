<?php
class Connexion {
    public static function getConnexion() {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=ecole', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }
}
?>
