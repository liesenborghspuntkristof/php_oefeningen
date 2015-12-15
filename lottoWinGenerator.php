<?php 
//lottoWinGenerator.php

require_once "WinnendeGetallen.php"

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
        <title>De winnende lotto-getallen generator</title>
        <style>
            table, td {border: 1px solid black;}
            td {background-color: lightgray;}
            <?php
            $aantalGetallen = 7;  
            $rijen = 6; 
            $aantalWin = 6; 
            $wg = new WinnendeGetallen(); 
            $highlight = $wg->getWin($aantalGetallen, $rijen, $aantalWin);            
            for($p=0; $p<$aantalWin; $p++) {
                $highlightx = $highlight[$p]-1; 
                $winRest = (($highlightx-($highlightx%$aantalGetallen))/$aantalGetallen)+(1);
                $winMod = $highlight[$p]%$aantalGetallen; 
                if ($winMod==0) {$winMod=$aantalGetallen;}
                ?>
            tr:nth-child(<?php print($winRest); ?>) td:nth-child(<?php print($winMod); ?>) {
                background-color: yellow;
            }
            <?php } ?>
        </style>
    </head>
    <body>
        <?php print_r($highlight); ?>
        <table>
                <?php for($k=0; $k<$rijen; $k++) { ?>
                <tr>
                <?php for($i=0; $i<$aantalGetallen; $i++) {print("<td>" . (($i+1)+($aantalGetallen*$k)) . "</td>");} ?>
                </tr>
                <?php } ?>
        </table>
    </body>
</html>
