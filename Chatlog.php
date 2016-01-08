<?php

require_once 'Boodschap.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chatlog
 *
 * @author kristof.liesenborghs
 */
class Chatlog {
    //put your code here
    
    private $dbconn;
    private $dbUsername;
    private $dbPassword; 
    
    Public function __construct() {
        $this->dbconn = "mysql:host=localhost;dbname=cursusphp;charset=utf8";
        $this->dbUsername = "cursusgebruiker"; 
        $this->dbPassword = "cursuspwd";
    }
    
    public function getChat () {
        $sql = "SELECT id, nickname, boodschap, datum FROM (SELECT * FROM chatberichten ORDER BY datum DESC LIMIT 19) AS laatste ORDER BY datum ASC"; 
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $lijst = array(); 
        foreach ($resultSet as $rij) {
            $boodschap = new Boodschap($rij["id"], $rij["nickname"], $rij["boodschap"], $rij["datum"]); 
            array_push($lijst, $boodschap); 
        }
        $dbh = null;
        return $lijst;
    }
    
    public function createChat ($nickname, $boodschap) {
        if (!empty($boodschap)){
        $datum = date('Y-m-d H:i:s');
        $sql = "insert into chatberichten (nickname, boodschap, datum) values (:nickname, :boodschap, :datum)";
        $dbh = new PDO($this->dbconn, $this->dbUsername, $this->dbPassword);
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':nickname' => $nickname, ':boodschap' => $boodschap, ':datum' => $datum));
        $dbh = null;
        $_SESSION["check"] = $boodschap . "=old"; 
        }
    }
        
    }
    

