<?php
//schattenjacht_oplossingenboek.php

session_start();

if (isset($_GET["reset"]) && $_GET["reset"] == 1) {
    unset($_SESSION["deurenReeks"]);
    unset($_SESSION["schattenDeurNr"]);
    unset($_SESSION["aantalkeer"]);     // EXTRA
}

if (!isset($_SESSION["deurenReeks"])) {
    $_SESSION["aantalkeer"] = 0;    // EXTRA
    $_SESSION["deurenReeks"] = array();
    
    for ($i = 1; $i <= 7; $i++) {
        $_SESSION["deurenReeks"][$i] = 0;
    }
    $_SESSION["schattenDeurNr"] = rand(1, 7);
}

if (isset($_GET["kiesdeur"])) {
    $_SESSION["aantalkeer"] +=1;     // EXTRA
    
    $gekozenDeurNr = $_GET["kiesdeur"];
    if ($gekozenDeurNr == $_SESSION["schattenDeurNr"]) {
        $_SESSION["deurenReeks"][$gekozenDeurNr] = 2;
        $msg= "Geraden in " . $_SESSION["aantalkeer"] . " beurt(en)!";     // EXTRA
        
    } else {
        $_SESSION["deurenReeks"][$gekozenDeurNr] = 1;
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Schattenjacht</title>
        <style>
            img { border-width: 0px;}
            .inactief {pointer-events: none;} /* EXTRA */
            .image {text-decoration: none;}
        </style>
    </head>
    <body>
        <h1>Kies een deur</h1>
        
        <?php
        for ($i = 1; $i <= 7; $i++) {
            ?>
            <a class="image" href="schattenjacht_oplossingenboek.php?kiesdeur=<?php print($i);?>" 
                <?php if(isset($msg)) {print('class="inactief"');} ?> > <!-- EXTRA -->
                <?php
                if ($_SESSION["deurenReeks"][$i] == 0) {
                    ?>
                <img src="doors/doorclosed.png" alt="gesloten deur"/>
                    <?php
                } elseif ($_SESSION["deurenReeks"][$i] == 1) {
                    ?>
                <img src="doors/dooropen.png" alt="open deur" />
                    <?php
                } elseif ($_SESSION["deurenReeks"][$i] == 2) {
                    ?>
                <img src="doors/doortreasure.png" alt="deur met schat" />
                    <?php
                }
                ?>
            </a>
            <?php
        }
        ?>
        <br />
        <!--EXTRA-->
        <p>
            <?php if(isset($msg)) {echo $msg;} ?>
        </p>
        <p>
            Klik <a href="schattenjacht_oplossingenboek.php?reset=1">hier</a> om een nieuw spel te beginnen.
        </p>
    </body>
</html>
