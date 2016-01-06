<?php

require_once('ModuleLijst.php'); 

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
        <title>resultaat Form modules opzoeken</title>
    </head>
    <body>
        <h1>Zoekresultaat</h1>
		<?php
                $min = $_POST["minimum"]; 
                $max = $_POST["maximum"];
                //echo $min, " ",  $max;
		$pl = new ModuleLijst();
		$tab = $pl->getLijst($min, $max);
                //$bat = $pl->getLijst($max); 
		//$tab = $pl->getLijst('Peeters','V');
		?>
		<ul>
			<?php
			foreach ($tab as $naam) {
				print("<li>" . $naam . "</li>");
			}
			//foreach ($bat as $maan) {
			//	print("<li>" . $maan . "</li>");
			//}                        
			?>
		</ul>
    </body>
</html>
