<?php
session_start(); 

if(!isset($_SESSION["reTeller"]) || $_SESSION["reTeller"] >= 20) {
    $_SESSION["reTeller"] = 0; 
} else {
    $_SESSION["reTeller"]++; 
}


?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>refresch Teller</title>
        <style>
            body {text-align: center;}
            h2 {font-size: 50vmin; margin: 10vw;  }
        </style>
    </head>
    <body>
        <h1>Aantal<br>keer<br>ge-refreshed</h1>
        <h2>
        <?php
        print($_SESSION["reTeller"]); 
        ?>
        </h2>
        <span>reset na 20</span>
    </body>
</html>
