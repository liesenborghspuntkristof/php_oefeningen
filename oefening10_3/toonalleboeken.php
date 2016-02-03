<?php
//toonalleboeken.php
use VDAB\MijnProject\Business\BoekService;

require_once 'bootstrap.php';


$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();
include("src/VDAB/MijnProject/Presentation/boekenlijst.php");


