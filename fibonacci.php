<?php 
//fibonacci.php ft. randomarraygenerator.php

class ArrayGenerator {
    public function getArray(){
        $arr = array();
        $oud= 0;
        $nieuw = 1;
        for ($i = 0; $i < 30; $i += 2) {
            $arr[$i] = $oud;
            $arr[$i+1] = $nieuw;
            $oud += $nieuw;
            $nieuw += $oud;
            
        }
        return $arr;
    }
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
        <title></title>
    </head>
    <body>
        <h2>Mijn fibonacci oplossing: </h2>
        <?php
        $var1 = 0;
        $var2 = 1;
        while ($var2<5000) {
            print($var1 . " " . $var2 . " "); 
            $var1 += $var2; 
            $var2 += $var1; 
        }
        ?>
        <h2>De fibonacci-code uit het grote antwoordenboek: </h2>
         <?php
        $oud = 0;
        $nieuw = 1;
        print($oud . " ");
        
        while ($nieuw < 5000) {
            print($nieuw . " ");
            
            $vorigOud = $oud;
            $oud = $nieuw;
            $nieuw = $vorigOud + $oud;
        }
        ?>
        
        <h2>De fibonacci reeks met een array</h2>
        <pre>
        <?php
        $arrgen = new ArrayGenerator(); 
        print_r($arrgen->getArray());
        ?>
        </pre>
        
    </body>
</html>
