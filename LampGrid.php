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
        $dimension = 4;
        for ($x = 0; $x < $dimension; $x++) {
            for ($y = 0; $y < $dimension; $y++) {
                $lmp = new Lamp();
                $lampGrid[$x][$y] = $lmp->getStatus();
            }
        }
        return $lampGrid;
    }

}

function changeAll($lamp, $x, $y) {
    if (isset ($lamp)) {
        if ($lamp == "on") {
            $lamp = "off";
        } elseif ($lamp == "off") {
            $lamp = "on";
        }
        $_SESSION["lamp"][$x][$y] = $lamp;
    }
}
