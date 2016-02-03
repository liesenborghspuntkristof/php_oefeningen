<?php
//entities/Genre.php

namespace Entities; 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genre
 *
 * @author kristof.liesenborghs
 */
class Genre {
    
    private static $idMap = array(); 
    
    private $id; 
    private $genreNaam; 
    
    private function __construct($id, $genreNaam) {
        $this->id = $id;
        $this->genreNaam = $genreNaam; 
    }
    
    public static function create($id, $genreNaam) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Genre($id, $genreNaam); 
        }
        return self::$idMap[$id];
    }
    
    function getId() {
        return $this->id;
    }

    function getGenreNaam() {
        return $this->genreNaam;
    }

    function setGenreNaam($genreNaam) {
        $this->genreNaam = $genreNaam;
    }


}
