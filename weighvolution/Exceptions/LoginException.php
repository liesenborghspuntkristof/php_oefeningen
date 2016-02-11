<?php
//Exceptions/LoginException.php
require_once 'FalseLoginException.php';
require_once 'InvalidInputException.php'; 
require_once 'RecordedUserException.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginException
 *
 * @author kristof.liesenborghs
 */
abstract class LoginException extends Exception {
    //put your code here
}
