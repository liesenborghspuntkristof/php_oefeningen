<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lamp
 *
 * @author kristof.liesenborghs
 */
class Lamp {

    private $status;

    public function __construct() {
        $random = rand(0, 1);
        if ($random == 1) {
            $this->status = "on";
        } else {
            $this->status = "off";
        }
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        if ($status == "on") {
            $this->status = "off";
        } elseif ($status == "off") {
            $this->status = "on";
        }
         
    }
    
    function cheatStatus(){
        $this->status = "off"; 
    } 

}
