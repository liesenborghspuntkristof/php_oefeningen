<?php

session_start();

if (!isset($_SESSION["dispAantal"])) {$_SESSION["dispAantal"]= 7;}

if (isset($_GET["reset"]) && $_GET["reset"] == 1) {
    unset($_SESSION["dispAantal"]); 
    $_SESSION["dispAantal"]= 7;
}
if (isset($_POST["een"]) && $_POST["een"] == 1) {
        $_SESSION["dispAantal"]--; 
}
if (isset($_POST["twee"]) && $_POST["twee"] == 1) {
        $_SESSION["dispAantal"]-=2; 
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
        <h1>Luciferspel</h1>
        <?php if($_SESSION["dispAantal"] <= 0) {echo "<br><h2>Het spel is afgelopen.</h2>";} ?>
        <?php
        for ($i=0; $i<$_SESSION["dispAantal"]; $i++) { ?>
        <img src="img/lucifer.png">
        <?php } ?>
        <br>
    <form action="luciferspel.php" method="post">
        <?php if($_SESSION["dispAantal"]>=1) { ?>
        <button name="een" value="1" action="submit">Eén lucifer wegnemen</button>
        <?php } if($_SESSION["dispAantal"]>=2) { ?>
        <button name="twee" value="1" action="submit">Twee lucifer wegnemen</button>
        <?php } ?>
    </form>
        <p>Klik <a href="luciferspel.php?reset=1">hier</a> om opnieuw te beginnen</p>
    </body>
</html>
