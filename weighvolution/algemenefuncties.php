<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function string_to_ascii($string) {
    $ascii = array();
    for ($i = 0; $i < strlen($string); $i++) {
        $char = ord($string[$i]);
        array_push($ascii, $char);
    }
    return($ascii);
}

function check_valid_input($string, $minLength) {
    $valid = FALSE;
    if (strlen($string) >= $minLength && strlen($string) < 100) {
        $asciiArray = string_to_ascii($string);
        foreach ($asciiArray as $ascii) {
            switch (TRUE) {
                case ($ascii >= 48 && $ascii <= 57):  //numbers
                    $valid = TRUE;
                    break;
                case ($ascii >= 64 && $ascii <= 90):  //@ + UpperCase letters
                    $valid = TRUE;
                    break;
                case ($ascii >= 97 && $ascii <= 122): //lowerCase letters
                    $valid = TRUE;
                    break;
                case ($ascii >= 128 && $ascii <= 154): //special char part. 1
                    $valid = TRUE;
                    break;
                case ($ascii >= 160 && $ascii <= 165): //special char part. 2
                    $valid = TRUE;
                    break;
                case $ascii == 35://#
                case $ascii == 46://.
                case $ascii == 45://-
                case $ascii == 95://_
                    $valid = TRUE;
                    break;
                default :
                    $valid = FALSE;
            }
            if ($valid === FALSE) {
                break;
            }
        }
    }
    return $valid;
}

function check_no_numbers($string) {
    $noNumbers = TRUE;
    $asciiArray = string_to_ascii($string);
    foreach ($asciiArray as $ascii) {
        if ($ascii >= 48 && $ascii <= 57) {
            $noNumbers = FALSE;
        }
        if ($noNumbers == FALSE) {
            break;
        }
    }
    return $noNumbers;
}

function check_at($string) {
    $at = FALSE;
    $atCounter = 0;
    $asciiArray = string_to_ascii($string);
    foreach ($asciiArray as $ascii) {
        if ($ascii == 64) {
            $atCounter++;
        }
    }
    if ($atCounter == 1) {
        $at = TRUE;
    }
    return $at;
}

function check_password($string) {
    $passwordCheck = FALSE;
    $numberCount = 0;
    $capitalCount = 0;
    if (check_valid_input($string, 6)) {
        $asciiArray = string_to_ascii($string);
        foreach ($asciiArray as $ascii) {
            switch (TRUE) {
                case ($ascii >= 48 && $ascii <= 57):  //numbers
                    $numberCount++;
                    break;
                case ($ascii >= 65 && $ascii <= 90):  //UpperCase letters
                    $capitalCount++;
                    break;
            }
        }
        if ($numberCount > 0 && $capitalCount > 0) {
            $passwordCheck = TRUE;
        }
    }
    return $passwordCheck;
}

function redirect_arrayName() {
    $par1 = strrev($_SERVER['REMOTE_ADDR']);
    $arrayName = sha1("weighvolution" . $par1);
    return $arrayName;
}

function redirect_par() {
    $par1 = $_SERVER['REMOTE_ADDR'];
    $par2 = strtoupper(gethostbyaddr($par1));
    $par = sha1($par2 . "weighvolution");
    return $par;
}

function passwordEncrypt($username, $password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
//        $salt = openssl_random_pseudo_bytes(64); -> random salt = veiliger maar dan moet je die mee opslaan in de database
//        var_dump($salt); 
//        $data = crypt($password, $salt); == use blowfish encryption == good
//        $hashedValue = hash_hmac ('sha256', $data, $key) -> safest = use extra key that is completely hidden = stored on an other virtual server on a the server
        $salt = strtoupper(strrev($username));
        $data = crypt($password, $salt);
        $hashedValue = hash('sha256', $data);
        return $hashedValue;
    } else {
        throw new LogicException("No blowfish for sale, try again or contact support"); 
    }
}


function randomColor() {
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    return $color;
}