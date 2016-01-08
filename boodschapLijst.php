<?php

require_once 'Boodschap.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of boodschapLijst
 *
 * @author kristof.liesenborghs
 */
class boodschapLijst {
    //put your code here
    private $dbconn;
    private $dbUsername;
    private $dbPassword;
    
    public function __construct() {
        $this->dbconn = "mysql:host=localhost;dbname=cursusphp;charset=utf8";
        $this->dbUsername = "cursusgebruiker"; 
        $this->dbPassword = "cursuspwd"; 
    }
    
        public function getLijst() {
        $sql = "select id, auteur, boodschap, datum from gastenboek order by id";
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword); 
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $lijst = array(); 
        foreach ($resultSet as $rij) {
            $boodschap = new Boodschap($rij["id"], $rij["auteur"], $rij["boodschap"], $rij["datum"]); 
            array_push($lijst, $boodschap); 
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getLijst_asc() {
        $sql = "select id, auteur, boodschap, datum from gastenboek order by datum ASC";
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword); 
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $lijst = array(); 
        foreach ($resultSet as $rij) {
            $boodschap = new Boodschap($rij["id"], $rij["auteur"], $rij["boodschap"], $rij["datum"]); 
            array_push($lijst, $boodschap); 
        }
        $dbh = null;
        return $lijst;
    }
    
        public function getLijst_desc() {
        $sql = "select id, auteur, boodschap, datum from gastenboek order by datum DESC";
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword); 
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $lijst = array(); 
        foreach ($resultSet as $rij) {
            $boodschap = new Boodschap($rij["id"], $rij["auteur"], $rij["boodschap"], $rij["datum"]); 
            array_push($lijst, $boodschap); 
        }
        $dbh = null;
        return $lijst;
    }
    
    public function createBoodschap($auteur, $boodschap) {
        if (!empty($auteur) && !empty($boodschap) && strlen($boodschap) <= 200
                && $_POST["boodschap"] != $_SESSION["boodschap"] || $_POST["auteur"] != $_SESSION["auteur"]){
        //$test = strlen($boodschap); echo($test); 
        $datum = date('Y-m-d H:i:s');
        $sql = "insert into gastenboek (auteur, boodschap, datum) values (:auteur, :boodschap, :datum)";
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword); 
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':auteur' => $auteur, ':boodschap' => $boodschap, ':datum' => $datum));
        $dbh = null;
        $_SESSION["boodschap"] = $_POST["boodschap"];
        $_SESSION["auteur"] = $_POST["auteur"]; 
    } else { echo ('Ongeldige invoer, probeer opnieuw'); }
    }
}
