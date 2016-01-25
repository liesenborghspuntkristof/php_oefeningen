<?php 

require_once 'boodschapLijst.php';
session_start(); 

$boodschaplijst = new boodschapLijst();

if (isset($_GET["action"]) && $_GET["action"] == "verzend") {  
    $boodschaplijst->createBoodschap($_POST["auteur"], $_POST["boodschap"]); 
}

if (isset($_POST["sorteerkeuze"]) && $_POST["sorteerkeuze"] == "oplopend") {
    $lijst = $boodschaplijst->getLijst_asc();
}elseif (isset($_POST["sorteerkeuze"]) && $_POST["sorteerkeuze"] == "aflopend") {
    $lijst = $boodschaplijst->getLijst_desc();
} else {$lijst = $boodschaplijst->getLijst();}
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
            p {max-width: 90vw; }  
            span {word-break: break-all;}
            .rechts {float: right; display: block;}
        </style>
    </head>
    <body>
        <h1>Berichten</h1>
        
        <!-- Hier de berichten uit de database met een border-bottom -->
        <?php
        
         
        
        foreach ($lijst as $boodschap) {
				$auteur = $boodschap->getAuteur();
				$bericht = $boodschap->getBoodschap();
				print("<p><span class='vet'>Auteur: </span>"
                                        . $auteur . "</br><span class='cursief'>"
                                        . $bericht . "</span></p>");
        }
        ?>
        <form class="rechts" action="gastenboek.php" method="post">
        <select   name="sorteerkeuze" onchange="submit">
                <option  <?php if (isset($_POST["sorteerkeuze"]) && $_POST["sorteerkeuze"] == "oplopend") {
                    echo ("selected=''");} ?>
                    value="oplopend">datum oplopend</option>
                <option  <?php if (isset($_POST["sorteerkeuze"]) && $_POST["sorteerkeuze"] == "aflopend") {
                    echo ("selected=''");} ?>
                    value="aflopend">datum aflopend</option>
            </select>
            </br><input class="rechts" type="submit" value="bevestig">
        </form>

      
        <!--    <?php echo($_POST["sorteerkeuze"]); ?> -->
       
        <h1>Bericht toevoegen</h1>
        <form id="gastenboekform"  action="gastenboek.php?action=verzend" method="post">
            <span class="vet">Auteur: </span>
            <input  type="text" name="auteur" placeholder="stel uzelf voor" required="required" autofocus=""></br>
            <span class="vet">Boodschap:</span>
            <textarea class="boodschap" form="gastenboekform" required="required" maxlength="200" name="boodschap"
                      placeholder="schrijf hier uw boodschap (max. 200 karakters)"></textarea>
            <input type="submit" value="Verzenden">
        </form> 
    </body>
</html>
