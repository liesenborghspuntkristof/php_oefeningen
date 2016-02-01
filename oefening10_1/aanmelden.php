<?php

require_once 'business/UserService.php';
require_once 'debugger.php';

session_start();



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



if (isset($_GET["action"]) && $_GET["action"] == "login") {
    phpAlert($_POST["username"]);
    phpAlert($_POST["password"]);
    $counter = 0;
    foreach (unserialize($_COOKIE["test"]) as $user) {
        if ($user->getUsername() == $_POST["username"] && $user->getPassword() == $_POST["password"]) {
            $counter++;
        }
    }
    if ($counter == 1) {
        $_SESSION["topSecret"] = "access granted";
    }
    phpAlert($_SESSION["topSecret"]);
    header("location:toongeheim.php");
    exit(0);
}

//if (isset($_GET["action"]) && $_GET["action"] == "new") {
//    $userSvc = new UserService(); 
//    $userSvc->storeUser($_POST["username"], $_POST["password"]); 
//    header ("location:aanmelden.php"); 
//    exit(0); 
//}

include 'presentation/aanmeldenForm.php';

if (isset($_SESSION["topSecret"])) {
    echo ($_SESSION["topSecret"]);
}


if (isset($_SESSION["allowedIn"])) {
    var_dump($_SESSION["allowedIn"]);
}

if (isset($_COOKIE["test"])) { 
    var_dump(unserialize($_COOKIE["test"])); 
}