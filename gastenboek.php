<?php 

require_once 'boodschapLijst.php';
require_once 'Boodschap.php';

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
        <title>Een Rudimentair gastenboek</title>
        <style>
            .vet {font-weight: bold;}
            p {border-bottom: 1.5px solid black; padding-top: 0.5em; padding-bottom: 0.5em; margin-left: 2em; }
            input, textArea {margin: 0.5em 0;}
            .boodschap {display: block; width: 80vw; height: 7em; }
            .cursief {font-style: italic;}
        </style>
    </head>
    <body>
        <h1>Berichten</h1>
        
        <!-- Hier de berichten uit de database met een border-bottom -->
        <?php
        $boodschaplijst = new boodschapLijst(); 
        $lijst = $boodschaplijst->getLijst();
        foreach ($lijst as $boodschap) {
				$auteur = $boodschap->getAuteur();
				$bericht = $boodschap->getBoodschap();
				print("<p><span class='vet'>Auteur: </span>"
                                        . $auteur . "</br><span class='cursief'>"
                                        . $bericht . "</span></p>");
        }
        ?>
        <h1>Bericht toevoegen</h1>
        <form id="gastenboekform"  action="gastenboek.php?action=verzend" method="post">
            <span class="vet">Auteur: </span>
            <input  type="text" name="auteur" placeholder="stel uzelf voor" required="required" autofocus=""></br>
            <span class="vet">Boodschap:</span>
            <textarea class="boodschap" form="gastenboekform" required="required" maxlength="200" name="boodschap" placeholder="schrijf hier uw boodschap"></textarea>
            <input type="submit" value="Verzenden">
        </form> 
    </body>
</html>
