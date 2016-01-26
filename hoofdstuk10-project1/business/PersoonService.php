<?php
//business/PersoonService.php
require_once 'data/PersoonDAO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersoonService
 *
 * @author kristof.liesenborghs
 */
class PersoonService {
    
    public function getPersonenOverzicht(){
        $pDAO = new PersoonDAO(); 
        $personen = $pDAO->getAll(); 
        return $personen;
    }
}
