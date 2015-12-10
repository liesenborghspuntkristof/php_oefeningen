<?php
//seizoenen.php

class SeizoenenArrayGenerator {
    public function getSeizoenen() {
        $seizoenen = array();
        array_push($seizoenen, "winter");
        array_push($seizoenen, "Lente");
        array_push($seizoenen, "Zomer"); 
        array_push($seizoenen, "Herfst");
        return $seizoenen; 
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
        $sag = new SeizoenenArrayGenerator(); 
        print_r($sag->getSeizoenen()); 
        ?>
        </pre>
    </body>
</html>
