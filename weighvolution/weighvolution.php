<?php
//weighvolution.php

require_once 'Business/ChallengeService.php';
require_once 'algemenefuncties.php';
require_once 'debugger.php';

session_start();

if (!isset($_SESSION[redirect_arrayName()]) || $_SESSION[redirect_arrayName()] !== redirect_par()) {
    header("location:aanmelden.php");
    exit(0);
} else {
    $challengeSvc = new ChallengeService();
    $service = $challengeSvc->checkChallenge($_SESSION["username"]);
    if ($service) {
        $challenge = $challengeSvc->getChallegeby($_SESSION["username"]);  
        $height = 500; 
        $width = 1000; 
        $topG = $challenge->getStartGewicht() + 5;
        $bottomG = $challenge->getEindGewicht() + 5; 
        $bereik = (($challenge->getStartGewicht() + 5) - ($challenge->getEindGewicht() - 5)) * 10;
//        var_dump($bereik); 
        $gpRatio = $height / $bereik;  
        $startIdeaalLijn = 0 . "," . round(((($topG - $challenge->getStartGewicht()) * 10) * $gpRatio), 0, PHP_ROUND_HALF_UP); 
//        var_dump($startIdeaalLijn); 
        $EindeIdeaalLijn = 1000 . "," . round(((($topG - $challenge->getEindGewicht()) * 10) * $gpRatio), 0, PHP_ROUND_HALF_UP); 
//        var_dump($EindeIdeaalLijn); 
        include_once 'Presentation/weighvolutionChart.php';
    } else {
        header("location:challengeAdjust.php");
        exit(0);
    }
}
