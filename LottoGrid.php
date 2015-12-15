<?php
//LottoGrid.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LottoGrid
 *
 * @author kristof.liesenborghs
 */
class LottoGrid {
    public function setGrid($getallenInEenRij) {
        $tab = array();
        for($t=0; $t<$getallenInEenRij; $t++) {
            $tab[$t]=$t+1;
        }
        return $tab;
    }
}
