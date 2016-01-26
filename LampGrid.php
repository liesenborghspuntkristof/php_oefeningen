<?php

require_once 'Lamp.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LampGrid
 *
 * @author kristof.liesenborghs
 */
class LampGrid {

    public function getLampGrid() {
        $dimension = $_SESSION["dimension"];
        for ($x = 0; $x < $dimension; $x++) {
            for ($y = 0; $y < $dimension; $y++) {
                $lmp = new Lamp();
                $lampGrid[$x][$y] = $lmp;
            }
        }
//        var_dump($lampGrid); 
        return $lampGrid;
    }

}

function changeAll($x, $y) {
    $edge = $_SESSION["dimension"] - 1;
    if ($x >= 0 && $x <= $edge && $y >= 0 && $y <= $edge) {
        $status = $_SESSION["lamp"][$x][$y]->getStatus();
//    var_dump($_SESSION["lamp"][$x][$y]); 
//        print ($status);
        $_SESSION["lamp"][$x][$y]->setStatus($status);


//    if (isset ($lamp)) {
//        if ($lamp == "on") {
//            $lamp = "off";
//        } elseif ($lamp == "off") {
//            $lamp = "on";
//        }
//        $_SESSION["lamp"][$x][$y] = $lamp;
//    }
    }
}

function cheatAll () {
    for ($x=0; $x < $_SESSION["dimension"]; $x++) {
        for ($y=0; $y < $_SESSION["dimension"]; $y++){
            $_SESSION["lamp"][$x][$y]->cheatStatus(); 
        }
    }
}
