<?php 
//tafels.php

require_once "TafelTabel.php";

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
        <title>tafels</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
        $tt = new TafelTabel(); 
        $tafel = $tt->getTabel($_POST["grondtal"]); 
        $tabelgrootte = count ($tafel); 
        ?>
        <table>
            <thead>
                <tr>
                    <th colspan="2">De tafel van <?php print($_POST["grondtal"]) ?></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            for ($i=0; $i < $tabelgrootte; $i++) {              
            ?>
                <tr>
                    <td><?php print($i+1 . " maal " . $_POST["grondtal"]); ?></td>
                    <td><?php print($tafel[$i]); ?></td>
                </tr>
            <?php } ?>
                </tbody>
        </table>
    </body>
</html>
