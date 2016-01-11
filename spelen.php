<?php

session_start(); 

require_once 'vakLijst.php';

$vaklijst = new VakLijst(); 

if (!isset($_SESSION["check"])) {$_SESSION["check"] = "dfjiejkdfjiekkkekejklme10e"; }

if (isset($_GET["kleur"]) && $_GET["kleur"] == "geel") {
    $_SESSION["kleur"] = "geel"; 
}

if (isset($_GET["kleur"]) && $_GET["kleur"] == "rood") {
    $_SESSION["kleur"] = "rood"; 
}

if (isset($_GET["click"]) && $_GET["click"] != $_SESSION["check"]) {
    
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
        <title>Vier op een Rij</title>
        <style>
            table, tr, td, tbody, img {border-collapse: collapse; padding: 0; margin: 0; border-spacing: 0; }
            img {display: block;}
            
        </style>
    </head>
    <body>
        <table>
        <?php
        $lijst = $vaklijst->getVaklijst(); 
        $teller = 0; 
        foreach ($lijst as $grid ) {
            $rijnummer = $grid->getRijnummer(); 
            $kolomnummer = $grid->getKolomnummer();
            $status = $grid->getStatus();
            if ($rijnummer != $teller) {echo ("<tr>");}           
            if ($status == 0) {echo ("<td><a href='spelen.php?click=" . $kolomnummer . "'><img src='img/emptyslot.png'></a></td>");} else {
                if ($status == 9221){echo ("<td><a href='spelen.php?click=" . $kolomnummer . "'><img src='img/yellowslot.png'></a></td>");} 
                elseif ($status == 3008) {echo ("<td><a href='spelen.php?click=" . $kolomnummer . "'><img src='img/redslot.png'></a></td>");}
            }
            if ($kolomnummer == 7) {echo ("</tr>");}
            $teller = $rijnummer;
            }
             
            
            
        
        ?>
        </table>
    </body>
</html>
