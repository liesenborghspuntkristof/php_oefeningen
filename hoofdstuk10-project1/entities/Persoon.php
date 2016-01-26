<?php

//enteteis/Persoon.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persoon
 *
 * @author kristof.liesenborghs
 */
class Persoon {

    private $familienaam;
    private $voornaam;

    function __construct($familienaam, $voornaam) {
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
    }

    function getFamilienaam() {
        return $this->familienaam;
    }

    function getVoornaam() {
        return $this->voornaam;
    }

    function setFamilienaam($familienaam) {
        $this->familienaam = $familienaam;
    }

    function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

}
