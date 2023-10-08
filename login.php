<?php
session_start();

include("inc/init.inc.php"); // Incluez le fichier de connexion à la base de données

if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Échappez les variables pour éviter les injections SQL
    $name = $bdd->quote($name);
    $password = $bdd->quote($password);

    // Utilisez des requêtes préparées pour éviter les injections SQL
    $sql = "SELECT * FROM user WHERE name=$name AND password=$password";
    $result = $bdd->query($sql);

    if ($result->rowCount() === 1) {
        // L'utilisateur existe, définissez la session
        $_SESSION['name'] = $name;
        header('Location: index.php');
        exit; // Assurez-vous de sortir du script après la redirection
    } else {
        // L'utilisateur n'existe pas ou les informations sont incorrectes
        echo 'Invalid name or password';
    }
}

include("inc/head.inc.php");
include("inc/header.inc.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page de connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Page de connexion</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="name">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>

</html>