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

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    	$id = (int)$_GET['id'];

    	$supp = $db->prepare("DELETE FROM etudiants WHERE id = :id");
    	if (isset($id) && !is_null($id)) {
    		$supp->execute([
    			':id' => $id
    		]);
    		header("Location: liste.php");
    	}
    }

?>