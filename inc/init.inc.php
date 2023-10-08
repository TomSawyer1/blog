<?php

session_start();


// Connexion à la BDD

$host = "localhost";
$dbname = "blog";
$user = "root";
$pass = "";

$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


define("URL", "http://localhost/PHP/Blog/");
//define("ASSETS", URL . "assets/");
const ASSETS = URL . "assets/";
