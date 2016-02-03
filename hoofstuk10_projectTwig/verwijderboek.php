<?php
//verwijderboek.php
require_once 'Business/BoekService.php';
use Business\BoekService; 
require_once 'bootstrap.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$boekSvc = new BoekService(); 
$boekSvc->verwijderBoek($_GET["id"]); 
header("location: toonalleboeken.php"); 
exit(0); 

