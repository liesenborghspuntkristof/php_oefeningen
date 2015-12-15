<?php
//WinnendeGetallen.php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WinnendeGetallen
 *
 * @author kristof.liesenborghs
 */
class WinnendeGetallen {
    public function getWin($aantalKolommen, $aantalRijen, $aantalWinnendeGetallen) {
    $tab = range(1, ($aantalKolommen*$aantalRijen)); 
    shuffle($tab); 
    $win=array();
    for ($t=0; $t<$aantalWinnendeGetallen; $t++){
        $win[$t]=$tab[$t];
    }
    return $win;
    }
}

