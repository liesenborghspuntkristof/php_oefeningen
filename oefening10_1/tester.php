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

$u = new User("kristof", "test");
$username = $u->getUsername();
$password = $u->getPassword();
phpAlert($username);

echo $username, "</br>";
phpAlert($password);
echo $password;

class UserDAO {

    public function createUser($username, $password) {
        $user = new User($username, $password);
        if (!isset($_SESSION["allowedIn"])) {
            $_SESSION["allowedIn"] = array();
        }
        array_push($_SESSION["allowedIn"], $user);
    }

}

$userDAO = new UserDAO();
$userDAO->createUser("sofie", "test");
var_dump($userDAO);
var_dump($_SESSION["allowedIn"]);

class UserService {

    public function storeUser($username, $password) {
        $userDAO = new UserDAO();
        $userDAO->createUser($username, $password);
    }

}

$userSvc = new UserService();
$userSvc->storeUser("liesenborghs", "testpwd");
var_dump($userSvc);
var_dump($_SESSION["allowedIn"]);

$userSvc2 = new UserService();
$userSvc2->storeUser("rasschaert", "testpwd2");
var_dump($userSvc2);
var_dump($_SESSION["allowedIn"]);


    foreach ($_SESSION["allowedIn"] as $user) {
        $username = $user->getUsername(); 
        $password = $user->getPassword(); 
        echo $username, "</br>"; 
        echo $password, "</br>"; 
    }
