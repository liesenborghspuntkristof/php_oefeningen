<?php
//boeken.php

class Boek {
    public function getTitel() {
        $titel = "Handleiding HTML";
        return $titel;
    }
}?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Boeken</title>
    </head>
    <body>
        <h1>
        <?php
        $boek = new Boek();
        print($boek->getTitel());
        ?>
        </h1>
    </body>
</html>
