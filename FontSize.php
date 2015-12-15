<?php
//FontSize.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FontSize
 *
 * @author kristof.liesenborghs
 */
class FontSize {
    public function getSize($start, $trap) {
        $tab = array(); 
        $tab[0]= $start; 
        for ($t=1; $t<7; $t++) {
            $tab[$t]=$tab[$t-1]+$trap; 
        }
        for ($i=7; $i<=12; $i++) {
            $tab[$i]=$tab[$i-1]-$trap; 
        }
        return $tab; 
    }
}
