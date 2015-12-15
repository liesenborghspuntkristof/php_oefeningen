<?php
//GetallenReeksMaker.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetallenReeksMaker
 *
 * @author kristof.liesenborghs
 */
class GetallenReeksMaker {
    public function getReeks() {
        $tab =array(); 
        for ($t=0; $t<10; $t++) {
            array_push($tab, rand(0, 100)); 
        }
        sort($tab); 
        return $tab; 
    }
}
