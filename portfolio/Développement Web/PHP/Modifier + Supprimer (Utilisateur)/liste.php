<?php 
	session_start();
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleform.css">
    <title>Tableau Des Etudiants</title>
</head>
<body>
	<h1>Liste des étudiants</h1>
	<div id="element">
		<table border="1">
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Filière</th>
			</tr>
			
			<?php
			    $sql = "SELECT * FROM etudiants";
			    $stmt = $db->query($sql);
			    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Initialisation de la première ligne

			    while($row) {
			    	echo "<tr>";
			    	echo "<td>" . $row['id'] . "</td>";
			    	echo "<td>" . $row['nom'] . "</td>";
			    	echo "<td>" . $row['prenom'] . "</td>";
			    	echo "<td>" . $row['email'] . "</td>";
			    	echo "<td>" . $row['filiere'] . "</td>";
			    	echo "</tr>";

			    	$row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la ligne suivante
			    } 
	  
			?>
			    

		</table>

		<?php 		    
			$errMss = "";
		    $found = false;

		    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		    	if(isset($_GET['id']) && is_numeric($_GET['id']))  {
			    	$id = (int)$_GET['id'];
			    	$checkId = $db->prepare("SELECT * FROM etudiants WHERE id = :id");
			        $checkId->execute([':id' => $id]);
			        $found = $checkId->rowCount() > 0;

			
			        if (!$found) {
			        	$errMss = "ID Introuvable !! Réssayer à nouveau";
			        } else {
			        	if (isset($_GET['modifier'])) {
			        		$_SESSION['id'] = $id;
			        		header("Location: modifier.php?id=$id");
			        		exit;
			        	}
			        	if (isset($_GET['supprimer'])) {
			        		header("Location: supprimer.php?id=$id");
			        		exit;
			        	}
		        	}

		    	}
		    } 

		?>
		<form method="GET" action="#">
			<label for="idDelete">Entrer un ID : </label><br>
			<input type="text" name="id" id="id" placeholder="ID">
			
			<input type="submit" name="modifier" value="Modifier">
			<input type="submit" name="supprimer" value="Supprimer"><br>
			<span class="errMss">
				<?php 
					echo $errMss; // probleme de modifier
				?>
			</span>
		</form>
	</div>

	<a href="ajout.php">Retour à la page d'ajout</a>

			  	

</body>
</html>



