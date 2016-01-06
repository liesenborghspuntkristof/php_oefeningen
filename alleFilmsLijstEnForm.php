<?php 
//alleFilmsLijstEnForm.php

require_once 'dbFilmToevoegen.php';
require_once 'filmLijst.php'; 

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
        <title>filmoverzicht</title>
        <style>
            span, input {margin-bottom: 0.5em; margin-top: 0.5em;}
        </style>
    </head>
    <body>
        <h1>Alle Films</h1>
        <?php
		$pl = new FilmLijst();
		$tab = $pl->getLijst();
		?>
		<ul>
			<?php
			foreach ($tab as $naam) {
				print("<li>" . $naam . "</li>");
			}                       
			?>
		</ul>
        <h1>Film toevoegen</h1>
        <form action="alleFilmsLijstEnForm.php" method="post">
            <span>Titel: <input type="text" name="filmtitel" placeholder="filmtitel" autofocus=""></span>
                </br>
                <span>Duurtijd: <input type="text" name="duurtijd" placeholder="duurtijd"> minuten</span>
                </br>
                <input type="submit" value="Toevoegen" name="submit">
        </form>
        
        <?php 
        if (isset($_POST["submit"])){
        $titel = $_POST["filmtitel"]; 
        $duurtijd = $_POST["duurtijd"]; 
        $flijst = new FilmToevoegen(); 
        $flijst->createFilm($titel, $duurtijd);
        unset($_POST["submit"]); 
        }
        ?>
    </body>
</html>
