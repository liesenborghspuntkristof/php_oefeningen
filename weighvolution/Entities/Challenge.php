<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Challenge
 *
 * @author kristof.liesenborghs
 */
class Challenge {
    
    private static $idMap = array(); 
    
    private $challengeId; 
    private $user; // = obj. User
    private $startDatum; 
    private $eindDatum; 
    private $startGewicht; 
    private $eindGewicht; 
    
    private function __construct($challengeId, $user, $startDatum, $eindDatum, $startGewicht, $eindGewicht) {
        $this->challengeId = $challengeId;
        $this->user = $user;
        $this->startDatum = $startDatum;
        $this->eindDatum = $eindDatum;
        $this->startGewicht = $startGewicht;
        $this->eindGewicht = $eindGewicht;
    }
    
    public static function create($challengeId, $user, $startDatum, $eindDatum, $startGewicht, $eindGewicht) {
        if (!isset(self::$idMap[$challengeId])){
            self::$idMap[$challengeId] = new Challenge($challengeId, $user, $startDatum, $eindDatum, $startGewicht, $eindGewicht); 
        }
        return self::$idMap[$challengeId];
    }


    function getChallengeId() {
        return $this->challengeId;
    }

    function getUser() {
        return $this->user;
    }

    function getStartDatum() {
        return $this->startDatum;
    }

    function getEindDatum() {
        return $this->eindDatum;
    }

    function getStartGewicht() {
        return $this->startGewicht;
    }

    function getEindGewicht() {
        return $this->eindGewicht;
    }


    function setUser($user) {
        $this->user = $user;
    }

    function setStartDatum($startDatum) {
        $this->startDatum = $startDatum;
    }

    function setEindDatum($eindDatum) {
        $this->eindDatum = $eindDatum;
    }

    function setStartGewicht($startGewicht) {
        $this->startGewicht = $startGewicht;
    }

    function setEindGewicht($eindGewicht) {
        $this->eindGewicht = $eindGewicht;
    }

  
}
