<?php
//FilmLijst_oplossingenboek.php

class FilmLijst {

    public function createFilm($titel, $duurtijd) {
        if (is_numeric($duurtijd) && $duurtijd > 0 && !empty($titel)) {

            $sql = "insert into films (titel, duurtijd) values (:titel, :duurtijd)";
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");

            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':titel' => $titel,
                ':duurtijd' => $duurtijd));
            $dbh = null;
        }
    }

    public function getLijst() {

        $sql = "select titel, duurtijd from films order by titel";
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");

        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $film = $rij["titel"] . " (" . $rij["duurtijd"] . " min)";
            array_push($lijst, $film);
        }
        $dbh = null;
        return $lijst;
    }

}