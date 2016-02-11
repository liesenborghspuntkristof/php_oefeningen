<?php

require_once 'Business/UserService.php';
require_once 'algemenefuncties.php';
require_once 'Exceptions/LoginException.php';
//require_once 'Exceptions/FalseLoginException.php';
//require_once 'Exceptions/InvalidInputException.php'; 

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET["action"]) && $_GET["action"] == "login") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        unset($_SESSION["msg"]);
        unset($_SESSION["warningmsg"]);
        try {
            $userSvc = new UserService();
            $service = $userSvc->checkLogin($_POST["username"], $_POST["password"]);
            if ($service == "access granted") {
                $_SESSION[redirect_arrayName()] = redirect_par();
                header("location:index.php");
                exit(0);
            }
        } catch (LoginException $ex) {
            $_SESSION["warningmsg"] = $ex->getMessage();
        }
    }
}

if (isset($_GET["action"]) && $_GET["action"] == "new") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"])) {
        unset($_SESSION["msg"]);
        unset($_SESSION["warningmsg"]);
        try {
            $userSvc = new UserService();
            $service = $userSvc->checkNewUser($_POST["username"], $_POST["name"], $_POST["surname"], $_POST["email"], $_POST["password"]);
            $_SESSION["msg"] = "nieuwe gebruiker geaccepteerd, U kan nu inloggen";
            header("location:index.php");
            exit(0);
        } catch (LoginException $ex) {
            $_SESSION["warningmsg"] = $ex->getMessage();
        }
    }
}

include 'Presentation/loginForm.php';
if (isset($_SESSION["warningmsg"])) {
    echo "<span class='center warning'>" . $_SESSION["warningmsg"] . "</span>";
} elseif (isset($_SESSION["msg"])) {
    echo "<span class='center confirm'>" . $_SESSION["msg"] . "</span>";
}
 
