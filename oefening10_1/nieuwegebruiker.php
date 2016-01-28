<?php
require_once 'business/UserService.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET["action"]) && $_GET["action"] == "new") {
    $userSvc = new UserService(); 
    $userSvc->storeUser($_POST["username"], $_POST["password"]); 
    header ("location:aanmelden.php"); 
    exit(0); 
}

include 'presentation/nieuwegebruikerForm.php'; 