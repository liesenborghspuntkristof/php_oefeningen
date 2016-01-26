<!DOCTYPE html>
<!--presentation/boekenlijst.php-->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Boeken</title>
        <style>
            table {border-collapse: collapse;}
            td, th {border: 1px solid black; padding: 3px;}
            th {background-color: #ddd;}
        </style>
    </head>
    <body>
        <h1>Boekenlijst</h1>

        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($boekenLijst as $boek) {
                    ?>
                    <tr>
                        <td>
                            <?php print($boek->getTitel()); ?>
                        </td>
                        <td>
                            <?php print($boek->getGenre()->getGenreNaam()); ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>

        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
