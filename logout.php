<?php
session_start();

// Détruire la session (c'est-à-dire déconnecter l'utilisateur)
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil ou une autre page
header('Location: index.php');
exit;
