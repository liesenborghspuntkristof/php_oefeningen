<?php
//frequentie.php

class RandomArrayGenerator {
    public function getArray() {
        $arr = array(); 
        for ($i=0; $i<100; $i++) {
           $arr[$i] = rand(1, 40); 
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
        <title>frequentie</title>
        <style>
            ul {
                list-style-type: none;
                float: left; 
            }
        </style>
    </head>
    <body>
        <ul>
            <?php 
            $rag = new RandomArrayGenerator();
            $lijst = $rag->getArray(); 
            foreach ($lijst as $sleutel=>$random) {
                print("<li>"); 
                print("[" . $sleutel . "]"); 
                print(" => ");
                print($random); 
                print("</li>"); 
            }
            ?>
        </ul>
        <ul>
        <?php
        $tabel = $lijst;  
        $verdeelsleutel = array();
        for ($t=0; $t<=40; $t++) {
            array_push($verdeelsleutel, 0); 
        }
        foreach ($tabel as $waarde) { 
            $verdeelsleutel[$waarde]++; 
        }
        for ($k=1; $k<=40; $k++) {
            print("<li>" . "Getal " . $k . " werd " . $verdeelsleutel[$k] . " keer gegenereerd." . "</li>");
        }
        ?>
        </ul>
        </body>
</html>
