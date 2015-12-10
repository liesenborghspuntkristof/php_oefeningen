<?php
//randomarraygenerator.php

class ArrayGenerator {
    public function getArray(){       
        $arr = array();
        $arr[0] = 0;
        for ($teller=1; $teller<50 ; $teller++) { 
            $arr[$teller] = $teller + $arr[$teller-1]; 
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
        <?php
        $array = new ArrayGenerator();
        print_r($array->getArray()); 
        ?>
    </body>
</html>
