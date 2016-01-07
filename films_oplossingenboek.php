<?php
//films.php
require_once 'FilmLijst_oplossingenboek.php';
require_once 'filmsVerwijderen.php';



$filmlijst = new FilmLijst();
if (isset($_GET["action"]) && $_GET["action"] == "new") {
    $filmlijst->createFilm($_POST["titel"], $_POST["duurtijd"]);
}

$filmLijster = new filmsVerwijderen();

if (isset($_GET["action"]) && $_GET["action"] == "verwijder") {
	$filmLijster->deleteFilm($_GET["id"]);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gegevens toevoegen</title>
        <style>
            input {margin-top: 0.5em; margin-bottom: 0.5em;}
            input:focus {background-color: yellow;}
        </style>
    </head>
    <body>
        <h1>Alle films</h1>

		<?php
                 
		$tab = $filmlijst->getLijst();
		?>
		<ul>
			<?php
			foreach ($tab as $film) {
				$filmTitel = $film->getTitel();
				$filmId = $film->getId();
                                $filmDuur = $film->getDuurtijd();
				print("<li>" . $filmTitel . " (" . $filmDuur . " min.)  <a  
					href=\"films_oplossingenboek.php?  
					action=verwijder&id=" .  
					$filmId . "\"><img src='img/delete.png' title='delete' alt='deleteknop'></a>"
                                        . " <a href=\"filmsBewerken.php?id="  
					. $filmId . "\"> Bewerken</a> </li>");
			}
			?>
        </ul>

        <h1>Film toevoegen</h1>

        <form action="films_oplossingenboek.php?action=new" method="post">
            Titel : <input type="text" name="titel" /><br /><br />
            Duurtijd : <input type="text" name="duurtijd" /> minuten<br />

<!--            Titel : <input type="text" name="titel" required="required" /><br /><br />
            Duurtijd : <input type="number" name="duurtijd" min="1" required="required" /> minuten<br />-->

            <input type="submit" value="Toevoegen" />
        </form>

    </body>
</html>
