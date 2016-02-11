<?php

require_once 'Data/UserDAO.php';
require_once 'algemenefuncties.php';
//require_once 'Exceptions/LoginException.php';
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
        if (check_valid_input($username, 6) && check_valid_input($password, 6)) {
            $userDAO = new UserDAO();
            $user = $userDAO->getByUsername($username);
//            var_dump($user);
            if ($user->getUsername() == NULL) {
                throw new FalseLoginException("Username does not exist");
            }
            if ($username === $user->getUsername() && passwordEncrypt($username, $password) === $user->getPassword()) {
                $check = "access granted";
            } else {
                throw new FalseLoginException("Password doesn't match Username");
            }
        } else {
            throw new InvalidInputException("false Input = input needs to be minimum 6 long, only numbers, letters, capital letters and # @ . - or _");
        }
        return $check;
    }

    public function checkNewUser ($username, $name, $surname, $email, $password) {
        switch (FALSE) {
            case check_valid_input($username, 6): 
                throw new InvalidInputException ("false Username Input = input needs to be minimum 6 long, only numbers, letters, capital letters and # @ . - or _");
            case check_valid_input($name, 1):
            case check_no_numbers($name):
                throw new InvalidInputException ("false name Input = input needs to be minimum 1 long, only letters, capital letters and # @ . - or _");
            case check_valid_input($surname, 1):
            case check_no_numbers($surname):
                throw new InvalidInputException ("false surname Input = input needs to be minimum 1 long, only letters, capital letters and # @ . - or _");
            case check_valid_input($email, 6):
            case check_at($email): 
                throw new InvalidInputException ("false email Input = input needs to be minimum 6 long, only numbers, letters, capital letters and # @ . - or _");
            case check_password($password): 
                throw new InvalidInputException ("false password Input = input needs to be minimum 6 long, only numbers, letters, capital letters and # @ . - or _");
        }
        
        $hashedpwd = passwordEncrypt($username, $password); 
        $userDAO = new UserDAO(); 
        $userDAO->createUser($username, $name, $surname, $email, $hashedpwd);
    }
}
