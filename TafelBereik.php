<?php
//TafelBereik.php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TafelBereik
 *
 * @author kristof.liesenborghs
 */
class TafelBereik {
    public function getTab($stopWaarde) {
        $tab = array();
        for($t=0; $t<$stopWaarde; $t++) {
            $tab[$t]=$t+1; 
        }
        return $tab; 
    }
}
