<?php
//FilmLijst_oplossingenboek.php

class Film {

	private $id;
	private $titel;
	private $duurtijd;
	
	public function __construct($id, $titel, $duurtijd) {
		$this->id = $id;
		$this->titel = $titel;
		$this->duurtijd = $duurtijd;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getTitel() {
		return $this->titel;
	}
	
	public function getDuurtijd() {
		return $this->duurtijd;
	}
        
        public function setTitel($titel) {
            $this->titel = $titel;
        }
        
        public function setDuurtijd($duurtijd) {
            $this->titel = $duurtijd;
        }
}

class FilmLijst {

        public function createFilm($titel, $duurtijd) {
        if (is_numeric($duurtijd) && $duurtijd > 0 && !empty($titel)) {

            $sql = "insert into films (titel, duurtijd) values (:titel, :duurtijd)";
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8",
                    "cursusgebruiker", "cursuspwd");

            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':titel' => $titel,
                ':duurtijd' => $duurtijd));
            $dbh = null;
        }
    }
    
	public function getLijst() {
		$sql = "select id, titel, duurtijd from films order by titel";
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", 
			"cursusgebruiker", "cursuspwd");
		$resultSet = $dbh->query($sql);

		$lijst = array();
		foreach ($resultSet as $rij) {
			$film = new Film($rij["id"], $rij["titel"], $rij["duurtijd"]);
			array_push($lijst, $film);
		}
		$dbh = null;
		return $lijst;
	}
        
	public function getFilmsById($id) {
		$sql = "select titel, duurtijd from films where id = :id";
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8",
                    "cursusgebruiker", "cursuspwd");

		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(':id' => $id));	
		$rij = $stmt->fetch(PDO::FETCH_ASSOC);	 
		$film = new Film($id, $rij["titel"], $rij["duurtijd"]);
		$dbh = null;
		return $film;			
	}
        
           public function updateFilm($film) {
		$sql = "update films set titel = :titel, duurtijd = :duurtijd where id = :id";
       	$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8",
                    "cursusgebruiker", "cursuspwd");

     	$stmt = $dbh->prepare($sql);
 		$resultSet = $stmt->execute(array(
            ':titel' => $film->getTitel(),
            ':duurtijd' => $film->getDuurtijd(),
            ':id' => $film->getId()));
        $dbh = null;	
	}
}