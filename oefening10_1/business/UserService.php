<?php

require_once 'data/UserDAO.php';

//session_start();  if you activate session here the controllers don't need a session_start();

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


    public function storeUser($username, $password) {
        $userDAO = new UserDAO();
        $userDAO->createUser($username, $password);
    }

}
