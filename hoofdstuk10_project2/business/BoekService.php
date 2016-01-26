<?php

//business/BoekService.php
require_once 'data/BoekDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BoekService
 *
 * @author kristof.liesenborghs
 */
class BoekService {

    public function getBoekenOverzicht() {
        $boekDAO = new BoekDAO();
        $lijst = $boekDAO->getAll();
        return $lijst;
    }
    
    public function voegNieuwBoekToe ($titel, $genreId) {
        $boekDAO = new BoekDAO(); 
        $boekDAO->create($titel, $genreId); 
    }

}
