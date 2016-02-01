<?php
require_once 'entities/User.php';
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
        $user = new User($username, $password); 
        if (!isset($_SESSION["allowedIn"])) {
            $_SESSION["allowedIn"] = array();
        } 
        array_push($_SESSION["allowedIn"], $user); 
        if (isset($_COOKIE["test"])) {
            $previous = unserialize($_COOKIE["test"]);
            $new = $_SESSION["allowedIn"]; 
            $access = array_merge($previous, $new);  
        } else {$access = $_SESSION["allowedIn"];}
        setcookie("test", serialize($access), time()+3600); 
    }
        
    
}
