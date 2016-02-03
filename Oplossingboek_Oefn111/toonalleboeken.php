<?php

//toonalleboeken.php

require_once ("Business/BoekService.php");
require_once ("bootstrap.php");
use Business\BoekService;

$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();

$view = $twig->render("boekenlijst.twig", array( "boekenLijst" => $boekenLijst ));
print($view);
