<?php
include("inc/init.inc.php");

if (!empty($_POST)) { //On appelle les portiers que si le formulaire est validé

    if (!isset($_POST["name"]) || empty($_POST["name"])) {
        $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Nom !
		</div>";
    }

    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        $_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Email !
		</div>";
    }

    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        $_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Mot de passe !
		</div>";
    }

    // S'il n'y a pas de messages d'erreurs...
    if (empty($_SESSION["message"])) {
        $name = strtolower(htmlspecialchars($_POST["name"]));
        $email = strtolower(htmlspecialchars($_POST["email"]));
        $password = strtolower(htmlspecialchars($_POST["password"]));
    }

    $requete = "INSERT INTO `user`(`name`, `email`, `password`) VALUES (?, ?, ?)";

    $requetePrepare = $bdd->prepare($requete);

    $reponse = $requetePrepare->execute([

        $name,
        $email,
        $password
    ]);

    if ($reponse) {
        $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
  				Bravo vous vous est bien inscrit !
			</div>";
        header("Location:inscription.php");
        exit;
    } else {
        $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Il y a eu une erreur lors de l'ajout en base de donnée
			</div>";
    }
}


include("inc/head.inc.php");
include("inc/header.inc.php");
?>
<h1 class="text-center my-5">Inscription</h1>
<?= isset($_SESSION["message"]) ? $_SESSION["message"] : "";
$_SESSION["message"] = "";
?>



<form method="post" action="inscription.php" class="w-50 mx-auto">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>