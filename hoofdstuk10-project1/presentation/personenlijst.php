<!DOCTYPE html>
<!--presentation/personenlijst.php-->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MVC</title>
    </head>
    <body>
        <h1>Personenlijst</h1>
        <ul>
            <?php
            foreach ($personen as $persoon) {
                ?>
                <li>
                    <?php print ($persoon->getFamilienaam() . "," . $persoon->getVoornaam()); ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </body>
</html>
