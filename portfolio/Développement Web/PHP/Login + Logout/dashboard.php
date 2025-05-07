<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
		exit();
	} 
	else {
		echo "<h1>Bienvenue " . $_SESSION['username'] . "</h1>";
	}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    	body {
    		font-family: Arial, sans-serif;
    	}
    	h1 {
    		margin-top: 20px;
    	}
    	a {
    		text-decoration: none;
    		padding: 14px;
			width: 100%;
			border-style: none;
			background-color: #2A7B9B;
			color: white;
			font-size: 14px;
			cursor: pointer;
    	}
    </style>
</head>
<body>
	<br>
    <a href="logout.php">Déconnexion</a>
    
</body>
</html>