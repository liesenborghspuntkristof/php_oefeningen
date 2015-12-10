<?php
//geheim.php

class Geheim {
    public function getResultaat(){
        $mijnGetal = 10;
        $mijngetal = $mijnGetal * $mijnGetal;
        return $mijnGetal;
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
        <title>Geheim</title>
    </head>
    <body>
        <h1>
        <?php
        $geheim = new Geheim();
        print($geheim->getResultaat());
        ?>
        </h1>
    </body>
</html>
