<?php

require_once 'Business/UserService.php';
require_once 'algemenefuncties.php';
session_start(); 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//if (session_status() !== PHP_SESSION_ACTIVE) {
//    header("location:aanmelden.php");
//    exit(0);
//} else {
//    session_start();
//}
if (!isset($_SESSION[redirect_arrayName()]) || $_SESSION[redirect_arrayName()] !== redirect_par()) {
    header("location:aanmelden.php");
    exit(0);
} else {
    header("location:weighvolution.php");
}