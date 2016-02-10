<?php
//Data/ViewerDAO.php
require_once 'Entities/Viewer.php';
require_once 'DBConfig.php';
require_once 'UserDAO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewerDAO
 *
 * @author kristof.liesenborghs
 */
class ViewerDAO {
    public function getAll() {
        $sql = "SELECT viewerID, username, viewer FROM viewers";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $userDAO = new UserDAO(); 
            $user = $userDAO->getByUsername($rij["username"]);
//            var_dump($user); 
            $viewer = $userDAO->getByUsername($rij["viewer"]); 
//            var_dump($viewer); 
            $viewerLijst = Viewer::create($rij["viewerID"], $user, $viewer);
            array_push($lijst, $viewerLijst);
        }
        $dbh = null;
        return $lijst;
    }
}
