<?php
//filmsBewerken.php
require_once 'FilmLijst_oplossingenboek.php';




$updated= false;
if (isset($_GET["action"]) && $_GET["action"] == "verwerk") {
	$fiml = new Film($_GET["id"], $_POST["titel"], $_POST["duurtijd"]);
	$fLijst = new FilmLijst();
	$fLijst->updateFilm($fiml);
	$updated = true;
}
?>


 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gegevens bewerken</title>
        <style>
            input {margin-top: 0.5em; margin-bottom: 0.5em;}
            #Back {display: block; margin-top: 2em; }
            input:focus {background-color: yellow;}
        </style>
    </head>
    <body>
        <h1>Film bijwerken</h1>
		<?php
		if ($updated) {
			print("Record bijgewerkt!");
		}
                $gfbid = new FilmLijst(); 
                $film = $gfbid->getFilmsById($_GET["id"]);
                $filmTitel = $film->getTitel();
                $filmDuur = $film->getDuurtijd();
		?>
        <form action="filmsBewerken.php?action=verwerk&id=<?php print($_GET["id"]); ?>" method="post">
            Titel: <input type="text" name="titel" value="<?php print($filmTitel); ?>" autofocus="yellow">
            </br>
            Duurtijd: <input type="text" name="duurtijd" value="<?php print($filmDuur); ?>">
            </br>
            <input type="submit" value="Bewerken">                            
        </form>
        <a id="Back" href="films_oplossingenboek.php">Terug naar overzicht</a>
    </body>
</html>
