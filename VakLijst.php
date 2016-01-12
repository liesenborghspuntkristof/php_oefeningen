<?php

require_once 'VierOpEenRijVak.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VakLijst
 *
 * @author kristof.liesenborghs
 */
class VakLijst {
    private $dbConn;
    private $dbUsername;
    private $dbPassw; 
    
    public function __construct() {
        $this->dbConn = "mysql:host=localhost;dbname=cursusphp;charset=utf8";
        $this->dbUsername = "cursusgebruiker"; 
        $this->dbPassw = "cursuspwd";
    }
    
    public function getVaklijst() {
        $sql = "SELECT rijnummer, kolomnummer, status FROM vieropeenrij_spelbord order by rijnummer DESC, kolomnummer ASC"; 
        $dbh = new PDO ($this->dbConn, $this->dbUsername, $this->dbPassw); 
        
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $lijst = array();
        foreach ($resultSet as $rij) {
            $voer = new VierOpEenRijVak($rij["rijnummer"], $rij["kolomnummer"], $rij["status"]);
            array_push($lijst, $voer);             
        }
        $dbh = null; 
        return $lijst; 
        print_r($lijst); 
    }
    
    public function updateVak ($rijnummer, $kolomnummer, $kleur) {
        if ($kleur == "geel") {
        $sql = "update vieropeenrij_spelbord set status = '9221' where kolomnummer = :kolomnummer and rijnummer = :rijnummer";
        }
        if ($kleur == "rood") {
        $sql = "update vieropeenrij_spelbord set status = '3008' where kolomnummer = :kolomnummer and rijnummer = :rijnummer";
        }        
        $dbh = new PDO ($this->dbConn, $this->dbUsername, $this->dbPassw); 
        
        $stmt = $dbh->prepare($sql); 
        $resultSet = $stmt->execute(array(
                ":rijnummer" => $rijnummer, 
                ":kolomnummer" => $kolomnummer));
        
        $dbh = null;
    }
    
    public function clearVak () {
        $sql = "update vieropeenrij_spelbord set status = '0'";
        $dbh = new PDO ($this->dbConn, $this->dbUsername, $this->dbPassw); 
        
        $stmt = $dbh->prepare($sql); 
        $resultSet = $stmt->execute();  
        $dbh = null;
    }
}
