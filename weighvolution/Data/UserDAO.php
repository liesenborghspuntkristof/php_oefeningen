<?php

//Data/UserDAO.php
require_once 'DBConfig.php';
require_once 'Entities/User.php';
//require_once 'Exceptions/LoginException.php';
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

    public function getByUsername($username) {

        $sql = "SELECT username, password, name, surname, email FROM user WHERE username = :username";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':username' => $username));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = User::create($rij["username"], $rij["password"], $rij["name"], $rij["surname"], $rij["email"]);
        $dbh = null;
        return $user;
    }

    public function getByEmail($email) {

        $sql = "SELECT username, password, name, surname, email FROM user WHERE email = :email";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = User::create($rij["username"], $rij["password"], $rij["name"], $rij["surname"], $rij["email"]);
        $dbh = null;
        return $user;
    }

    public function createUser($username, $name, $surname, $email, $password) {
        $bestaandeUser = $this->getByUsername($username);
//        var_dump($bestaandeUser); 
        $bestaandeEmail = $this->getByEmail($email);
//        var_dump($bestaandeEmail); 
        if (!is_null($bestaandeUser->getUsername())) {
            throw new RecordedUserException('username already exists');
        } elseif (!is_null($bestaandeEmail->getEmail())) {
            throw new RecordedUserException('a user is already registered under this email address');
        }
        
        $sql = "INSERT INTO user (username, password, name, surname, email) VALUES (:username, :password, :name, :surname, :email)";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':email' => $email, ':username' => $username, ':password' => $password, ':name' => $name, ':surname' => $surname));
        $dbh = null;
    }

}
