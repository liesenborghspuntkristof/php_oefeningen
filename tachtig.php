<?php
//tachtig.php

class RandomArrayGenerator {
    public function getRandomArray80 () {
        $randomArr = array();
        $random = 0; 
        while ($random<80) {
            $random = rand(1,100);
            array_push($randomArr, $random);  
        }
        return $randomArr; 
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
        <pre>
        <?php
        $rag = new RandomArrayGenerator (); 
        print_r($rag->getRandomArray80()); 
        ?>
        </pre>
    </body>
</html>
