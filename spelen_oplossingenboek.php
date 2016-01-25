<?php
//spelen_oplossingenboek.php 

session_start();
require_once("Spel_oplossingenboek.php");
$spel = new Spel();

if (isset($_GET["action"])) {
    if ($_GET["action"] == "kiesgeel") {
        $_SESSION["mijnkleur"] = 1;
    } elseif ($_GET["action"] == "kiesrood") {
        $_SESSION["mijnkleur"] = 2;
    } elseif ($_GET["action"] == "plaatsmunt") {
        $kolom = $_GET["kolom"];
        $spel->gooiMunt($kolom, $_SESSION["mijnkleur"]);
    } elseif ($_GET["action"] == "reset") {
        $spel->reset();
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vier op een Rij</title>
    </head>
    <body>
        <h1>Vier op een Rij</h1>

        <table>
            <?php
            for ($rij = 1; $rij <= 6; $rij++) {
                ?>
                <tr>
                    <?php
                    for ($kolom = 1; $kolom <= 7; $kolom++) {
                        ?>
                        <td>
                            <a href="spelen_oplossingenboek.php?action=plaatsmunt&kolom=<?php print($kolom); ?>">
                                <?php
                                if ($spel->getStatus($rij, $kolom) == 0) {
                                    ?>
                                    <img src="img/emptyslot.png">
                                    <?php
                                } elseif ($spel->getStatus($rij, $kolom) == 1) {
                                    ?>
                                    <img src="img/yellowslot.png">
                                    <?php
                                } elseif ($spel->getStatus($rij, $kolom) == 2) {
                                    ?>
                                    <img src="img/redslot.png">
                                    <?php
                                }
                                ?>
                            </a>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            <?php }
            ?>
        </table>

        <p><a href="spelen_oplossingenboek.php">Vernieuw bord</a></p>
        <p><a href="spelen_oplossingenboek.php?action=reset">Spel herstarten</a></p>

    </body>
</html>
