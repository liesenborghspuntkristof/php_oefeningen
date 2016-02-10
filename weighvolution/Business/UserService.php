<?php
require_once 'Data/UserDAO.php';
require_once 'algemenefuncties.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserService
 *
 * @author kristof.liesenborghs
 */
class UserService {
    
    public function checkLogin($username, $password) {
        $check = "access denied"; 
        if (check_valid_input($username) && check_valid_input($password)) {
            $userDAO = new UserDAO(); 
            $user = $userDAO->getByUsername($username);
            var_dump($user); 
            if ($username == $user->getUsername() && $password == $user->getPassword) {
                $check = "access granted"; 
            }
        }
        return $check; 
    }
}
