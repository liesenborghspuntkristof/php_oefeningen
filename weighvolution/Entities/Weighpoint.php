<?php
//Entities/Weighpoint.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of weighpoint
 *
 * @author kristof.liesenborghs
 */
class Weighpoint {
    
    private static $idMap = array(); 
    
    private $pointId; 
    private $challenge; // = obj. Challenge
    private $gewicht; 
    private $date; 
    
    private function __construct($pointId, $challenge, $gewicht, $date) {
        $this->pointId = $pointId;
        $this->challenge = $challenge;
        $this->gewicht = $gewicht;
        $this->date = $date;
    }
    
    public static function create($pointId, $challenge, $gewicht, $date) {
        if (!isset(self::$idMap[$pointId])) {
            self::$idMap[$pointId] = new Weighpoint($pointId, $challenge, $gewicht, $date); 
        }
        return self::$idMap[$pointId]; 
    }

    

    function getPointId() {
        return $this->pointId;
    }

    function getChallenge() {
        return $this->challenge;
    }

    function getGewicht() {
        return $this->gewicht;
    }

    function getDate() {
        return $this->date;
    }

    function setChallenge($challenge) {
        $this->challenge = $challenge;
    }

    function setGewicht($gewicht) {
        $this->gewicht = $gewicht;
    }

    function setDate($date) {
        $this->date = $date;
    }


}
