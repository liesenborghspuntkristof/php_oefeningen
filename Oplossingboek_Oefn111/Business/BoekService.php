<?php

//Business/BoekService.php

namespace Business;
require_once 'Data/BoekDAO.php';
require_once 'Data/GenreDAO.php';
use Data\BoekDAO;
use Data\GenreDAO;

class BoekService {

    public function haalBoekOp($id) {
        $boekDAO = new BoekDAO();
        $boek = $boekDAO->getById($id);
        return $boek;
    }
    
    public function getBoekenOverzicht() {
        $boekDAO = new BoekDAO();
        $lijst = $boekDAO->getAll();
        return $lijst;
    }

    public function voegNieuwBoekToe($titel, $genreId) {
        $boekDAO = new BoekDAO();
        $boekDAO->create($titel, $genreId);
    }

    public function verwijderBoek($id) {
        $boekDAO = new BoekDAO();
        $boekDAO->delete($id);
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
