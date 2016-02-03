<?php
//src/VDAB/Mijnproject/Business/GenreService.php

namespace VDAB\MijnProject\Business;
use VDAB\MijnProject\Data\GenreDAO;
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
