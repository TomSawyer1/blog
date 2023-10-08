<?php
include("inc/init.inc.php");

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion ou affichez un message d'erreur
    $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
        Vous devez être connecté pour accéder à cette page.
    </div>";
    header("Location: login.php"); // Remplacez 'login.php' par la page de connexion réelle
    exit;
}

if (!empty($_POST)) {

    if (!isset($_POST["name"]) || empty($_POST["name"])) {
        $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Nom !
		</div>";
    }

    if (!isset($_POST["title"]) || empty($_POST["title"])) {
        $_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs titre !
		</div>";
    }

    if (!isset($_POST["content"]) || empty($_POST["content"])) {
        $_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs content !
		</div>";
    }

    if (empty($_SESSION["message"])) {

        // $town = strtolower(htmlspecialchars($_POST["town"]));
        $name = strtolower(htmlspecialchars($_POST["name"]));
        $title = strtolower(htmlspecialchars($_POST["title"]));
        $content = strtolower(htmlspecialchars($_POST["content"]));

        $requete = "INSERT INTO `article`(`name`, `title`, `content`) VALUES (?, ?, ?)";

        $requetePrepare = $bdd->prepare($requete);

        $reponse = $requetePrepare->execute([

            $name,
            $title,
            $content
        ]);

        if ($reponse) {
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
  				Bravo votre article est bien inscrit !
			</div>";
            header("Location:index.php");
            exit;
        } else {
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Il y a eu une erreur lors de l'ajout en base de donnée
			</div>";
        }
    }
}
include("inc/head.inc.php");
include("inc/header.inc.php");
?>

<!DOCTYPE html>
<html lang="fr">



<div class="container">
    <h1>Ajouter un article</h1>
    <form action="ajt-articles.php" method="post">
        <div class="form-group">
            <label for="name">Nom de l'article</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>