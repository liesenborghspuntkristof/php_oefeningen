<?php 

session_start(); 

if (isset($_GET["reset"]) && $_GET["reset"] == 1) {
    unset($_SESSION["schatdeur"]);
    unset($_SESSION["deurImg"]); 
    unset($_SESSION["teller"]); 
}

if (!isset($_SESSION["schatdeur"])) {
    $_SESSION["schatdeur"] = rand(0,6);   
    $_SESSION["deurImg"]= array(); 
    for ($i=0; $i<7; $i++){$_SESSION["deurImg"][$i] = 0;}
    $_SESSION["teller"]=0; 
}

if (isset($_GET["deurklik"])) {
    $temp = $_GET["deurklik"];
    $schat = $_SESSION["schatdeur"];
    if ($_SESSION["deurImg"][$temp] == 0 && $_SESSION["deurImg"][$schat] <> 2 ) {
    $_SESSION["teller"]+= 1;     
    if ($temp == $schat) {
        $_SESSION["deurImg"][$temp] = 2; 
    } else { $_SESSION["deurImg"][$temp] = 1;}
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
        <title>schattenjacht</title>
        <style>
            .deurafbeelding {text-decoration: none; <?php if ($_SESSION["deurImg"][$_SESSION["schatdeur"]] == 2) {echo "cursor: default;"; } ?>}
            em {color: coral; font-weight: bold; font-family: monospace; font-style: normal; font-size: 1.5em;}
        </style>
    </head>
    <body>

        <h1>Kies een deur</h1>
        
        <?php
        for ($t=0; $t<7; $t++) { ?>
        <a class="deurafbeelding" href="schattenjacht.php?deurklik=<?php print($t); ?>">
        <?php 
            if ($_SESSION["deurImg"][$t] == 0) { ?>
            <img src="doors/doorclosed.png" alt="gesloten deur"> 
            <?php           
            } elseif ($_SESSION["deurImg"][$t] == 1) { ?>
            <img src="doors/dooropen.png" alt="open deur">
            <?php
            } elseif ($_SESSION["deurImg"][$t] == 2) { ?>
            <img src="doors/doortreasure.png" alt="schat deur">
            <?php } ?>
        </a>           
        <?php } ?>
        <br>
        <?php if ($_SESSION["deurImg"][$_SESSION["schatdeur"]] == 2) {echo "U heeft de schat in <em>", $_SESSION["teller"], "</em> keer gevonden"; } ?>
        <br><br>

        <p>Klik <a href="schattenjacht.php?reset=1" >hier</a> om opnieuw te beginnen </p>
    </body>
</html>
