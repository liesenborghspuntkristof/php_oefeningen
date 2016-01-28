<?php

require_once 'data/UserDAO.php';

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
