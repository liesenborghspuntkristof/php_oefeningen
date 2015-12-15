<?php
//tafelOverzicht.php

require_once "TafelBereik.php";
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
        <title>overzicht van de tafels van 1 tot 10</title>
        <style>
            table, td {border: 1px solid black;}
            tr:nth-child(5) td:nth-child(12) {background-color:yellow;}
        </style>
    </head>
    <body>
        <?php 
        $tb = new TafelBereik();
        $tafels = $tb->getTab(30); 
        $tabelgrootte = count($tafels); 
        ?>
        <table>
            <tr>
                <td></td>
                <?php for($t=0; $t<$tabelgrootte; $t++) {print("<td>" . $tafels[$t] . "</td>");} ?>
            </tr>
            <?php for($k=1; $k<=$tabelgrootte; $k++) { ?>
            <tr>
                <td><?php print($k); ?></td>
                <?php for($i=0; $i<$tabelgrootte; $i++) {print("<td>" . ($tafels[$i]*($k)) . "</td>");} ?>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
