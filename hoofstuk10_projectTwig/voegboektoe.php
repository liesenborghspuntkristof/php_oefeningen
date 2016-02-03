<?php

require_once("Business/GenreService.php");
require_once("Business/BoekService.php");
require_once("Exceptions/TitelBestaatException.php");
use Business\GenreService; 
use Business\BoekService; 
use Exceptions\TitelBestaatException; 
require_once 'bootstrap.php';

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try {
        BoekService::voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $ex) {
        header("location: voegboektoe.php?error=titelbestaat");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $error="";
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    $view = $twig->render("nieuwboekForm.twig", array("error" => $error, "genreLijst" => $genreLijst));
    print($view);
}


