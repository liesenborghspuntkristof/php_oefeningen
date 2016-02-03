<?php

//src/VDAB/MijnProject/Business/BoekService.php

namespace VDAB\MijnProject\Business;
use VDAB\MijnProject\Data\BoekDAO;
use VDAB\MijnProject\Data\GenreDAO;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BoekService
 *
 * @author kristof.liesenborghs
 */
class BoekService {

    public function getBoekenOverzicht() {
        $boekDAO = new BoekDAO();
        $lijst = $boekDAO->getAll();
        return $lijst;
    }
    
    public function voegNieuwBoekToe ($titel, $genreId) {
        $boekDAO = new BoekDAO(); 
        $boekDAO->create($titel, $genreId); 
    }
    
    public function verwijderBoek($id){
        $boekDAO = new BoekDAO(); 
        $boekDAO->delete($id); 
    }
    
    public function haalBoekOp($id) {
        $boekDAO = new BoekDAO(); 
        $boek = $boekDAO->getById($id); 
        return $boek; 
    }
    
    public function updateBoek($id, $titel, $genreId) {
        $genreDAO = new GenreDAO(); 
        $boekDAO = new BoekDAO(); 
        $genre = $genreDAO->getById($genreId); 
        $boek = $boekDAO->getById($id); 
        $boek->setTitel($titel); 
        $boek->setGenre($genre); 
        $boekDAO->update($boek); 
    }
 
}
