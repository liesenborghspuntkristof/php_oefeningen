<?php 
session_start(); 
require_once 'LampGrid.php';


if (!isset($_SESSION["lamp"])) {
$lampGrid = new LampGrid(); 
$_SESSION["lamp"] = $lampGrid->getLampGrid(); 
}

if (isset($_GET["x"]) && isset($_GET["y"])) {
$x = $_GET["x"]; 
$y = $_GET["y"]; 
$top = $x -1;
$bottom = $x +1; 
$left = $y -1; 
$right = $y +1; 

changeAll($_SESSION["lamp"][$x][$y], $x, $y);
changeAll($_SESSION["lamp"][$top][$y], $top, $y);
changeAll($_SESSION["lamp"][$bottom][$y], $bottom, $y);
changeAll($_SESSION["lamp"][$x][$left], $x, $left);
changeAll($_SESSION["lamp"][$x][$right], $x, $right);

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
        <title>Lights Out</title>
        <style>
            .on {background-image: url("img/lightsout-aan.png"); color: white;}
            .off {background-image: url("img/lightsout-uit.png"); color: lightsteelblue;}
            .on, .off {background-size: 100%; background-repeat: no-repeat;}
            a {width: 100%; height: 100%; display: block; text-align: center; padding-top: 1em; text-decoration: none; color: inherit;}
            td {width: 5em; height: 5em;}       
        </style>
    </head>
    <body>
        <table>
        <?php
        for ($x=0; $x<count($_SESSION["lamp"]); $x++ ){
            echo "<tr>";
            for ($y=0; $y<count($_SESSION["lamp"]); $y++){
                echo "<td class='",$_SESSION["lamp"][$x][$y], "'><a href='LightsOut.php?x=", $x, "&y=", $y, "'>", $_SESSION["lamp"][$x][$y], "</a></td>";
            }
            echo "</tr>"; 
        }
        ?>
        </table>
    </body>
</html>
