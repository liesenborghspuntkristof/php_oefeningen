<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filmLijst
 *
 * @author kristof.liesenborghs
 */
class filmLijst {
    
	public function getLijst() {		
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");
		$resultSet = $dbh->query("select titel, duurtijd from films");

		$lijst = array();
		foreach ($resultSet as $rij) {
			$naam = $rij["titel"] . " (" .	$rij["duurtijd"] . " min)";
			array_push($lijst, $naam);
		}
		$dbh = null;              
		return $lijst;
}
}
