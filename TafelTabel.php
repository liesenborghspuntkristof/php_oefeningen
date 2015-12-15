<?php
//TafelTabel.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TafelTabel
 *
 * @author kristof.liesenborghs
 */
class TafelTabel {
    public function getTabel($grondtal) {
        $tab = array(); 
        for ($t=0; $t<10; $t++) {
            $tab[$t]= $grondtal * ($t+1); 
        }
        return $tab;
    }
}
