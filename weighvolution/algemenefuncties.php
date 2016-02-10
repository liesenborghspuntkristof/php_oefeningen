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

function check_valid_input($string) {
    $valid = FALSE;
    if (strlen($string) > 4) {
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
                case ($ascii === 35 || $ascii === 46):  //# or .
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
