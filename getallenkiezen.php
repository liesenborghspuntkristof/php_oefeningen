<?php
//getalkiezen.php

class Getal {
    
    public function getWaarde($getal1, $getal2, $bewerking) {
        switch ($bewerking) {
            case "1": 
                $operator = $getal1 + $getal2; 
                return $operator; 
                break;
            case "2": 
                $operator = $getal1 - $getal2;
                return $operator; 
                break;
            case "3": 
                $operator = $getal1 * $getal2;
                return $operator;
                break;
            case "4": 
                $operator = $getal1 / $getal2; 
                return $operator;
                break;
            default :
                print("foutieve waarden van de parameter 'bewerking'; zie tabel onderaan");                 
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
        <title>getallen kiezen</title>
    </head>
    <body>
        <h1>Mogelijke waarden van de parameter 'bewerking' zijn: </h1>
        <ul>
            <li>1 -> Optellen</li>
            <li>2 -> Aftrekken</li>
            <li>3 -> Vermenigvuldigen</li>
            <li>4 -> Delen</li>
        </ul>
        <h2>
        <?php
switch ($_GET["bewerking"]) {
    case "1": 
        $symbool = "+";
        break;
    case "2": 
        $symbool = "-";
        break;
    case "3": 
        $symbool = "*";
        break;
    case "4": 
        $symbool = "/";
        break;
    default: 
        $symbool = "?"; 
        print("foutieve waarden van de parameter 'bewerking'; zie tabel bovenaan"); 
}
        $getal = new Getal();
        $resultaat = $getal->getWaarde($_GET["getal1"], $_GET["getal2"], $_GET["bewerking"]);
        print ($_GET["getal1"] . " " . $symbool . " " . $_GET["getal2"] . " = " . $resultaat); 
        ?>
        </h2>
    </body>
</html>
