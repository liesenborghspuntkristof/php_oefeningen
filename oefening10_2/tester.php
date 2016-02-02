<?php

session_start();
require_once 'debugger.php';
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
    private $username;
    private $password; 
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password; 
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }


}

class DBConfig {
    
    public static $DB_CONNSTRING = "mysql:host=localhost; dbname=cursusphp; charset=utf8"; 
    public static $DB_USERNAME = "cursusgebruiker"; 
    public static $DB_PASSWORD = "cursuspwd"; 
    
}

class UserDAO {

    public function createUser($username, $password) {
        var_dump($username); 
        var_dump($password); 
        $sql = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('rasschaert', 'schildpad')";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        var_dump($stmt); 
        $dbh = null;
        $user = new User($username, $password); 
        return $user; 
    }
    
//    array(':gebruikersnaam' => $username, ':wachtwoord' => $password)

    public function getAll() {
        $sql = "SELECT gebruikersnaam, wachtwoord FROM gebruikers";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $resultSet = $dbh->query($sql);
        var_dump($resultSet);

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

$userDAO = new UserDAO();
$users = $userDAO->getAll(); 
var_dump($users); 


$userDOA = new UserDAO(); 
$newUser = $userDAO->createUser("liesenborghs", "testpwd"); 
var_dump($newUser); 




//class UserService {
//
//    public function storeUser($username, $password) {
//        $userDAO = new UserDAO();
//        $userDAO->createUser($username, $password);
//    }
//
//    public function checkUser($username, $password) {
//        $count = 0;
//        $userDAO = new UserDAO();
//        $userDAO->getAll();
//
//        foreach ($userDAO as $user) {
//            if ($user->getUsername() == $username && $user->getPassword() == $password) {
//                $count++;
//            }
//        }
//        if ($count == 1) {
//            $_SESSION["topSecret"] = "access granted"; 
//        } else {
//            $_SESSION["topSecret"] = "access denied"; 
//            echo "FALSE username and/or password"; 
//        }
//    }
//
//}


