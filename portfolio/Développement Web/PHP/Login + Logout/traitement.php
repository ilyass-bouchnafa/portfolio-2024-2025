<?php
	session_start();
	$dsn = "mysql:host=localhost;dbname=ensa";
	$db_user = "root";
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	try {
		$db = new PDO($dsn, $db_user, "", $options);

		echo "Connexion au Data Base Réussite ! <br>";

	} catch(PDOException $e) {
		echo 'Erreur PDO : ' . $e->getMessage();
		exit();
	}  

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';
		
		$anth = $db->prepare("SELECT * FROM users WHERE username = :username");
		
		$anth->execute([
			':username' => $username
		]);

		$user = $anth->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($user);
		// echo "</pre>";
		// echo $password;
		// var_dump(password_verify($password, $user['password']));
		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['username'] = $username;
			header("Location:dashboard.php");
			exit();
		}
		else {
			$_SESSION['ErrMss'] = "Utilisateur introuvable !<br>";
			header("Location: login.php");
			exit();
		}
	}

?>