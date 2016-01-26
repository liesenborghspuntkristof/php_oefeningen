<?php
//lightsOut_spelen.php

session_start();
require_once("Spelbord.php");

if (isset($_GET["reset"])) {
    unset($_SESSION["spelbord"]);
}

if (!isset($_SESSION["spelbord"])) {
    $spelbord = new Spelbord(4, 4);
    $_SESSION["spelbord"] = serialize($spelbord); //$spelbord is een object !
//    var_dump ($spelbord); 
//    echo "</br>"; 
//    var_dump($_SESSION["spelbord"]); 
} else {
    $spelbord = unserialize($_SESSION["spelbord"]);
}

$alleLichtenZijnUit = false;
if (isset($_GET["schakelkolom"]) && isset($_GET["schakelrij"])) {
    $alleLichtenZijnUit = $spelbord->schakelOm($_GET["schakelkolom"], $_GET["schakelrij"]);
    $_SESSION["spelbord"] = serialize($spelbord);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lights out!</title>
    </head>
    <body>
        <h1>Lights out!</h1>

        <?php
        if ($alleLichtenZijnUit == true) {
            ?>
            <h2>U hebt gewonnen!!</h2>
            <?php
        } else {
            ?>
            <table>
                <tbody>
                    <?php
                    for ($rij = 0; $rij < $spelbord->getAantalRijen(); $rij++) {
                        ?>
                        <tr>
                            <?php
                            for ($kolom = 0; $kolom < $spelbord->getAantalKolommen(); $kolom++) {
                                ?>
                                <td>
                                    <a href="lightsOut_spelen.php?schakelkolom=<?php print($kolom); ?>&schakelrij=<?php print($rij); ?>">
                                        <?php
                                        if ($spelbord->getStatus($kolom, $rij) == 1) {
                                            ?>
                                            <img src="img/lightsout-aan.png" alt="licht aan" />
                                            <?php
                                        } else if ($spelbord->getStatus($kolom, $rij) == 0) {
                                            ?>
                                            <img src="img/lightsout-uit.png" alt="licht uit" />
                                            <?php
                                        }
                                        ?>
                                    </a>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
            <a href="lightsOut_spelen.php?reset=1">Nieuw spel</a>

    </body>
</html>