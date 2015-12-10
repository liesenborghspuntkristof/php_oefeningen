<?php 
//kleur.php

    if (!empty($_POST["kleur"])) {
        setcookie ("gekozenKleur", $_POST["kleur"], time() +86400); 
        $achtergrondkleur = $_POST["kleur"]; 
    } else {
        $achtergrondkleur = ""; 
        $active = ""; 
        if (isset($_COOKIE["gekozenKleur"])) {
            $achtergrondkleur = $_COOKIE["gekozenKleur"]; 
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
        <title>kleur</title>
        <style>
            <?php print("html {background-color: " . $achtergrondkleur . ";}") ?>
        </style>
    </head>
    <body>
        <form action="kleur.php" method="post">
            Kies uw favoriete achtergrondkleur: 
            <select name="kleur">
                <option value="Red">Rood</option>
                <option value="Blue">Blauw</option>
                <option value="Green">Groen</option>
                <option value="Yellow">Geel</option>
                <option value="white">Wit</option>
                    </select>
            <input type="submit" value="OK">
            </form>
        <a href="kleur.php">Pagina vernieuwen</a>
    </body>
</html>
