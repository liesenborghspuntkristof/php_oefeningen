<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VierOpEenRijVak
 *
 * @author kristof.liesenborghs
 */
class VierOpEenRijVak {
    private $rijnummer;
    private $kolomnummer;
    private $status; 
    
    public function __construct($rijnummer, $kolomnummer, $status) {
        $this->rijnummer = $rijnummer;
        $this->kolomnummer = $kolomnummer; 
        $this->status = $status; 
    }
        
    public function getRijnummer () {
        return $this->rijnummer; 
    }    
    
    public function getKolomnummer () {
        return $this->kolomnummer; 
    }
    
    public function getStatus () {
        return $this->status;
    }
      
           
}
