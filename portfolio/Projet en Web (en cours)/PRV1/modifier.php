<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            
        }
    </style>
</head>
<body>
    <form method="POST" action="#">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prenom">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="mdp" placeholder="Mot de passe">
        <input type="text" name="id" placeholder="ID">
        <select name="role">
            <option disabled selected>-- Role --</option>
            <option value="enseigant">Enseignant</option>
            <option value="administrateur">Administrateur</option>
        </select>
    </form>
    
</body>
</html>