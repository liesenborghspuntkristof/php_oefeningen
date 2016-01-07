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
        $sql = "select id, auteur, boodschap, datum from gastenboek order by auteur";
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
    
    public function createBoodschap($auteur, $boodschap, $datum) {
        $sql = "insert into gastenboek (auteur, boodschap, datum) values (:auteur, :boodschap, :datum)";
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword); 
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':auteur' => $auteur, ':boodschap' => $boodschap, ':datum' => $datum));
        $dbh = null;
    }
    
}
