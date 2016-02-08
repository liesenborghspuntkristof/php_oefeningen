<?php

//Data/UserDAO.php
require_once 'DBConfig.php';
require_once 'Entities/User.php';
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

    public function getAll() {
        $sql = "SELECT username, password, name, surname, email FROM user";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $user = User::create($rij["username"], $rij["password"], $rij["name"], $rij["surname"], $rij["email"]);
            array_push($lijst, $user);
        }
        $dbh = null;
        return $lijst;
    }

}
