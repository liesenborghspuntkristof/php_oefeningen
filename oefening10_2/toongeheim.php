<?php
require_once 'business/UserService.php';
require_once 'debugger.php';
session_start(); 




 
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION["topSecret"]) || $_SESSION["topSecret"] !== "access granted") {
    header("location: aanmelden.php"); 
    exit(0); 
}


if (isset($_SESSION["topSecret"]) && $_SESSION["topSecret"] == "access granted") {
    include 'presentation/geheimeinformatie.php';
}




