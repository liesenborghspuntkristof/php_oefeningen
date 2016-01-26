<?php 
require_once 'LampGrid.php';
session_start(); 

if (!isset($_SESSION["dimension"]) || (isset($_GET["action"]) && $_GET["action"] == "new")) {
    $_SESSION["dimension"] = 4; 
}

if (!isset($_SESSION["lamp"]) || (isset($_GET["action"]) && $_GET["action"] == "new")) {
$lampGrid = new LampGrid(); 
$_SESSION["lamp"] = $lampGrid->getLampGrid(); 
}

if (isset($_GET["action"]) && $_GET["action"] == "cheat") {
    cheatAll(); 
} 

$counter = 0; 
for ($x=0; $x < $_SESSION["dimension"]; $x++) {
    for ($y=0; $y < $_SESSION["dimension"]; $y++) {
        if ($_SESSION["lamp"][$x][$y]->getStatus() == "off") {
            $counter++; 
        }
    }
    if ($counter == $_SESSION["dimension"]*$_SESSION["dimension"] ) {
        header('location: WinLightsOut.php'); 
    }
}



if (isset($_GET["x"]) && isset($_GET["y"])) {
$x = $_GET["x"]; 
$y = $_GET["y"]; 
//var_dump ($_SESSION["lamp"][$x][$y]); 
$top = $x -1;
$bottom = $x +1; 
$left = $y -1; 
$right = $y +1; 

changeAll($x, $y);
changeAll($top, $y);
changeAll($bottom, $y);
changeAll($x, $left);
changeAll( $x, $right);

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
            #cheat {text-align: left; padding: 1em; margin: 1em; border: 1px solid black; display: block; width: 20%;  }
        </style>
    </head>
    <body>
        <table>
        <?php
        for ($x=0; $x<count($_SESSION["lamp"]); $x++ ){
            echo "<tr>";
            for ($y=0; $y<count($_SESSION["lamp"]); $y++){
                echo "<td class='",$_SESSION["lamp"][$x][$y]->getStatus(), "'><a href='LightsOut.php?x=", $x, "&y=", $y, "'>", $_SESSION["lamp"][$x][$y]->getStatus(), "</a></td>";
            }
            echo "</tr>"; 
        }
        ?>
        </table>
        <a id="cheat" href="LightsOut.php?action=cheat">Klik hier om te cheaten</a>
    </body>
</html>
