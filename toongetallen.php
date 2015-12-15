<?php 
//toongetallen.php

require_once ("GetallenReeksMaker.php");
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
        <title>Getallenreeks</title>
    </head>
    <body>
        <?php
        $getallenReeksMaker = new GetallenReeksMaker();
        $tabel = $getallenReeksMaker->getReeks(); 
        ?>
        <table border="1">
            <tbody>
                                <tr>
                <?php
                foreach ($tabel as $getal) {
                    ?>

                    <td>
                        <?php print ($getal);?>
                    </td>

                <?php
                }
                ?>
                                    </tr>
            </tbody>
        </table>
    </body>
</html>
