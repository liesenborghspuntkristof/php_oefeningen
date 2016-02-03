<?php
////toonalleboeken.php
//require_once("Business/BoekService.php");
//require_once("Libraries/Twig/Autoloader.php");
//
//Twig_Autoloader::register();
//$loader = new Twig_Loader_Filesystem("Presentation");
//$twig = new Twig_Environment($loader);
//
//$boekSvc = new BoekService();
//$boekenLijst = $boekSvc->getBoekenOverzicht();
//
//$view = $twig->render("boekenlijst.twig",  
//		array("boekenLijst" => $boekenLijst));
//print($view);

//toonalleboeken.php
require_once("Business/BoekService.php");
require_once("bootstrap.php");

use Business\BoekService; 

$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();

$view = $twig->render("boekenlijst.twig",  
		array("boekenLijst" => $boekenLijst));
print($view);


