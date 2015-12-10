<?php
//stappen.php

class Oefening {
    public function addWaarde($getal) {
    for ($teller = 20; $teller <=50; $teller += $getal) {
        print($teller . "<br />");
    }
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
        <h1>
        <?php
        $oef = new Oefening();
        print($oef->addWaarde(2));
        ?>
        </h1>
    </body>
</html>
