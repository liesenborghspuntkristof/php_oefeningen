<?php
//Entities/User.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author kristof.liesenborghs
 */
class User {
    
    private static $idMap = array(); 
    
    private $username;
    private $password; 
    private $name; 
    private $surname;
    private $email; 
    
    private function __construct($username, $password, $name, $surname, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }
    
    public static function create($username, $password, $name, $surname, $email) {
        if (!isset(self::$idMap[$username])){
            self::$idMap[$username] = new User($username, $password, $name, $surname, $email); 
        }
        return self::$idMap[$username]; 
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setEmail($email) {
        $this->email = $email;
    }



}
