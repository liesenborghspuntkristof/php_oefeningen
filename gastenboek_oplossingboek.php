<?php

//Gastenboek_oplossingboek.php
require_once("Berichten_oplossingenboek.php");

class GastenBoek {

    private $dbConn;
    private $dbUsername;
    private $dbPassword;

    public function __construct() {
        $this->dbConn = "mysql:host=localhost;dbname=cursusphp;charset=utf8";
        $this->dbUsername = "cursusgebruiker";
        $this->dbPassword = "cursuspwd";
    }

    public function getAlleBerichten() {
        $sql = "select id, auteur, boodschap, datum from gastenboek";
//        $sql = "select id, auteur, boodschap, datum from gastenboek order by datum desc";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $bericht = new Bericht($rij["id"], $rij["auteur"],
                    $rij["boodschap"], $rij["datum"]);
            array_push($lijst, $bericht);
        }
        $dbh = null;
        return $lijst;
    }

    public function createBericht($auteur, $boodschap) {        
        $sql = "insert into gastenboek (auteur, boodschap, datum) values (:auteur, :boodschap, :datum)";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        
        $stmt = $dbh->prepare($sql);
        $datum = date("Y-m-d H:i:s");
        $stmt->execute(array(
            ':auteur' => $auteur,
            ':boodschap' => $boodschap,
            ':datum' => $datum));
        $dbh = null;
    }

}