<?php
//analyse.php

class Oefening {
	public function getAnalyse($getal1, $getal2) {
                if ($getal1 == $getal2) {return "De getallen zijn gelijk";}
                elseif ($getal1 > $getal2) {return "Het eerste getal is groter dan het tweede";}
                else {return "Het tweede getal is groter dan het eerste";}
                }
	
}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8>
		<title>Analyse</title>
	</head>
	<body>
		<h1>
			<?php
			$oef = new Oefening();
			print($oef->getAnalyse(2, 7));
			?>
		</h1>
	</body>
</html>
