<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModuleLijst
 *
 * @author kristof.liesenborghs
 */
class ModuleLijst {

	public function getLijst($minWaarde, $maxWaarde) {
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", 
			"cursusgebruiker", "cursuspwd");

		//positionele params
		//$sql = "select naam, prijs from modules  
		//	where prijs >= ? and prijs <= ? "; 	
		//$stmt = $dbh->prepare($sql);
		//$stmt->execute(array($minWaarde, $maxWaarde));
		//$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //var_dump($resultSet); 
                //
		//benoemde params
		$sql = "select naam, prijs from modules  
			where prijs >= :minprijs and prijs <= :maxprijs order by prijs";
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(':minprijs' => $minWaarde, ':maxprijs' => $maxWaarde)); 
		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //var_dump($resultSet); 

		$lijst= array();
		foreach ($resultSet as $rij) {
			$naam = $rij["naam"] . " (" .	$rij["prijs"] . " euro)";
			array_push($lijst, $naam);
		}
		
		$dbh = null;
		return $lijst;
	}
	
}
