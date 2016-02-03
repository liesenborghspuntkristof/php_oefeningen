<?php

//updateboek.php
require_once 'Business/BoekService.php';
require_once 'Business/GenreService.php';
require_once 'Exceptions/TitelBestaatException.php';
use Business\BoekService;
use Business\GenreService;
use Exceptions\TitelBestaatException;
require_once ("bootstrap.php");

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try { 
        $boekSvc = new BoekService();
        $boekSvc->updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $tbe) {
        header("location: updateboek.php?id=" . $_GET["id"] . "&error=titelbestaat");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $boekSvc = new BoekService();
    $boek = $boekSvc->haalBoekOp($_GET["id"]);
    $error="";
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    $view = $twig->render("updateboekForm.twig", array('error' =>$error, 'boek' => $boek, 'genreLijst' => $genreLijst));
    print($view);
}














