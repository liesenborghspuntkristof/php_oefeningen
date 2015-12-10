<?php
//random5_1.php

session_start(); 

if (!isset($_SESSION["refresh"])) {
    $_SESSION["refresh"] = 0;  
} else {
    $_SESSION["refresh"]++; 
}
if (!isset($_SESSION["randomGetal"]) || $_SESSION["refresh"] == 10) {
            $_SESSION["refresh"] = 0; 
            $_SESSION["randomGetal"] = rand(1, 100); 
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
        <title>random hoofdstuk 5</title>
        <style>
            body {position: relative; width: 100%; height: 100vh; margin: 0;}
            h2 {display: inline-block; margin-left: 1em;}
            #refresh_counter {
                position: absolute; 
                display: block;
                bottom: 0; 
                right: 0; 
                background-color: red;
                height: 100px; 
                width: 100px; 
            }
            #refresh_counter span {
                position: relative;
                display: block;
                text-align: center; 
                margin-top: calc(50% - 0.5em);  
                 
            }
        </style>
         
    </head>
    <body>
        <h2>
        <?php 
        print ($_SESSION["randomGetal"]);               
        ?>
        </h2>
        <div id="refresh_counter">
            <span>
            <?php 
            print("#refresh: " . $_SESSION["refresh"]); 
            ?>
            </span>
        </div>
    </body>
</html>
