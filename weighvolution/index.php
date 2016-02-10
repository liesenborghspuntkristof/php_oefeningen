<?php
require_once 'Business/UserService.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET["action"]) && $_GET["action"] == "login") {
    $userSvc = new UserService(); 
    $service = $userSvc->checkLogin($_POST["username"], $_POST["password"]); 
    if ($service == "access granted") {
        header("location:timeTillXmas.php"); 
        exit(0);
    }
}

include 'Presentation/loginForm.php';