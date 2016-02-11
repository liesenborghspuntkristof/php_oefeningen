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
    $temp = strtoupper(strrev($username));
    $hashedValue = sha1(sha1($temp) . $password);
    return $hashedValue;
}
