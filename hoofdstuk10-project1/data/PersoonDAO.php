<?php

//data/PersoonDAO.php
require_once 'entities/Persoon.php';
require_once "DBConfig.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersoonDAO
 *
 * @author kristof.liesenborghs
 */
class PersoonDAO {

    public function getAll() {
        $sql = "select familienaam, voornaam from personen";

        $dbh = NEW PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

//        $resultset = $dbh->query($sql) -> If you don't use parameters to create dynamic queries (like in this case), you can also use ->query i/o ->prepare && ->execute (last option is safer)
    
        $lijst = array(); 
        foreach($resultSet as $rij) {
            $persoon = new Persoon($rij["familienaam"], $rij["voornaam"]); 
            array_push ($lijst, $persoon);            
        }
        $dbh = null; 
        return $lijst;
    }

}
