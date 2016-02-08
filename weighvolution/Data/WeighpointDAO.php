<?php
//Data/WeighpointDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Weighpoint.php'; 
require_once 'Entities/challenge.php';
require_once 'ChallengeDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WeighpointDAO
 *
 * @author kristof.liesenborghs
 */
class WeighpointDAO {
    public function getAll() {
        $sql = "select pointID, challangeID, date, weight from weighpoints";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $challengeDAO = new ChallengeDAO(); 
            $challenge = $challengeDAO->getById($rij["challangeID"]); 
            $weighpoint = Weighpoint::create($rij["pointID"], $challenge, $rij["weight"], $rij["date"]);
            array_push($lijst, $weighpoint);
        }
        $dbh = null;
        return $lijst;
    }
}
