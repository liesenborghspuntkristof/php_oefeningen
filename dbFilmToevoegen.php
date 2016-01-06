<?php
//dbFilmToevoegen.php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbFilmToevoegen
 *
 * @author kristof.liesenborghs
 */

class FilmToevoegen {

    public function createFilm($titel, $duurtijd) {
    if (isset($_POST["submit"]) && ($titel == null || $duurtijd == null ) || !is_numeric($duurtijd) || $duurtijd <= 0) { echo 'opnieuw'; } else {
    $sql = "insert into films (titel, duurtijd) values (:titel, :dtijd)";
    $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':titel' => $titel, ':dtijd' => $duurtijd));
    $dbh = null; 
    }
    }
}

