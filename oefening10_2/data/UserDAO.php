<?php

require_once 'entities/User.php';
require_once 'data/DBConfig.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAO
 *
 * @author kristof.liesenborghs
 */
class UserDAO {

    public function createUser($username, $password) {
        $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES :gebruikersnaam, :wachtwoord";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':gebruikersnaam' => $username, ':wachtwoord' => $password));

        $dbh = null;
    }

    public function getAll() {
        $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruikers";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $u = new User($rij["gebruikersnaam"], $rij["wachtwoord"]); 
            array_push($lijst, $u);
        }
        $dbh = null;
        return $lijst;
    }

}
