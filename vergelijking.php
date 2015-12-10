<?php
//vergelijking.php

class Vergelijking {
    public function getSomIsStriktPositief($getal1, $getal2) {
        $antw = (($getal1 + $getal2) > 0);
        if ($antw == true) {
            return "JA";
        }
        else {
            return "NEEN";
        }
    }
    public function getSomIsStriktNegatief($getal1, $getal2, $getal3) {
        $antw = (($getal1 + $getal2 + $getal3) < 0);
        if ($antw == true) {
            return "JA";
        }
        else {
            return "NEEN";
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
        $vgl = new Vergelijking();
        print ($vgl->getSomIsStriktPositief(10, -12));
        ?><br>
        <?php
        print ($vgl->getSomIsStriktNegatief(5, 10, -50))
        ?>
        </h1>
    </body>
</html>
