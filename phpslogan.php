<?php
//phpslogan.php

require_once "ZinGenerator.php";
require_once "FontSize.php"; 

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
        <title>PHP is Fantastisch</title>
        <style>
            body {font-family: monospace;}
            .container {width: 100vw; }
            span {
                position: relative; 
                display: block;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <?php
        $zg = new ZinGenerator();
        $zin = $zg->getZin(); 
        $fs = new FontSize();
        $tab = $fs->getSize(2, 1); 
        foreach ($tab as $fontsize) {
        ?>
        <span style="font-size:<?php print($fontsize); ?>vw"><?php print($zin);?></span>
        <?php } ?>
        </div>
    </body>
</html>
