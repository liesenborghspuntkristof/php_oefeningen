<?php
require_once 'business/UserService.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



if (isset($_GET["action"]) && $_GET["action"] == "login") {
    $counter = 0; 
    foreach ($_COOKIE["allowedIn"] as $user) {
        if ($user->getUsername() == $_POST["username"] && $user->getPassword() == $_POST["password"]) {
            $counter++; 
        }
        if ($counter == 1) {$_SESSION["topSecret"] = "access granted";}
    }
    header ("location:toongeheim.php"); 
    exit(0); 
}

//if (isset($_GET["action"]) && $_GET["action"] == "new") {
//    $userSvc = new UserService(); 
//    $userSvc->storeUser($_POST["username"], $_POST["password"]); 
//    header ("location:aanmelden.php"); 
//    exit(0); 
//}

include 'presentation/aanmeldenForm.php';

var_dump($_COOKIE["allowedIn"]);