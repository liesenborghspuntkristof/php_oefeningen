<?php
//business/GenreService.php
require_once 'data/GenreDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenreService
 *
 * @author kristof.liesenborghs
 */
class GenreService {
    
    public function getGenresOverzicht(){
        $genreDAO = new GenreDAO(); 
        $lijst = $genreDAO->getAll(); 
        return $lijst; 
    }
    
}
