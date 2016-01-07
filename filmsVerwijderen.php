<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filmsVerwijderen
 *
 * @author kristof.liesenborghs
 */
class filmsVerwijderen {
    	public function deleteFilm($id) {
		$sql = "delete from films where id = :id" ;
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8",  
			"cursusgebruiker", "cursuspwd");
		
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(':id' => $id));		
		$dbh = null;
	}
}
