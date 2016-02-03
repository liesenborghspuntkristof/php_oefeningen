<?php

//Business/GenreService.php

namespace Business;
require_once 'Data/GenreDAO.php';
use Data\GenreDAO;

class GenreService {

    public function getGenresOverzicht() {
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }

}
