<?php

require_once 'entities/User.php';
require_once 'DBConfig.php';
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
        var_dump($username); 
        var_dump($password); 
        $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':gebruikersnaam' => $username, ':wachtwoord' => $password));

        $dbh = null;
        $user = new User($username, $password); 
        return $user; 
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
        var_dump($lijst); 
        $dbh = null;
        return $lijst;
    }

}
