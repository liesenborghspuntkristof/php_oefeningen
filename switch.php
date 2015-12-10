<?php
//switch.php

class EenTotVijfOfNiet {
    public function getWaardeEenOfVijf($getal) {
            switch ($getal) {
    case "1":
        print("Een");
        break;
    case "2":
        print("Twee");
        break;
    case "3":
        print("Drie");
        break;
    case "4":
        print("Vier");
        break;
    case "5":
        print("Vijf");
        break;

    default:
        print("Een ander getal buiten het bereik van 1 tot 5");
        break;
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
        $etvon = new EenTotVijfOfNiet(); 
        print ($etvon->getWaardeEenOfVijf(5));
        ?>
        </h1>
    </body>
</html>
