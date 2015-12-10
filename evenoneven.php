<?php
//evenoneven.php

class Getal {
    public function getEvenOneven() {
        $arr = array();
        for ($i=1; $i<50; $i+=2) {
            array_push($arr,$i );
        }
        for ($i=2; $i<=50; $i+=2) {
            array_push($arr, $i); 
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
        <pre>
        <?php
        $array = new Getal();
        print_r($array->getEvenOneven()); 
        ?>
        </pre>
    </body>
</html>
