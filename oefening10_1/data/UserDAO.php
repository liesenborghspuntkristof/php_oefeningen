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
        $_COOKIE ["allowedIn"] = array();
        array_push($_COOKIE["allowedIn"], $user); 
    }
        
    
}
