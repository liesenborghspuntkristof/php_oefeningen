<?php

//Data/ChallengeDAO.php

require_once 'DBConfig.php';
require_once 'Entities/User.php';
require_once 'Entities/Challenge.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChallengeDAO
 *
 * @author kristof.liesenborghs
 */
class ChallengeDAO {

    public function getAll() {

        $sql = "select user.username as user_username, password, name, surname, email, challangeID, startdatum, einddatum, startgewicht, eindgewicht "
                . "from user, challanges where user.username = challanges.username";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $user = User::create($rij["user_username"], $rij["password"], $rij["name"], $rij["surname"], $rij["email"]);
            $challenge = Challenge::create($rij["challangeID"], $user, $rij["startdatum"], $rij["einddatum"], $rij["startgewicht"], $rij["eindgewicht"]);
            array_push($lijst, $challenge);
        }
        $dbh = null;
        return $lijst;
    }

    public function getById($challengeId) {

        $sql = "select user.username as user_username, password, name, surname, email, startdatum, einddatum, startgewicht, eindgewicht"
                . "from user, challanges where user.username = challanges.username and challangeID = :challengeId";

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':challengeId' => $challengeId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = User::create($rij["user_username"], $rij["password"], $rij["name"], $rij["surname"], $rij["email"]);
        $challenge = Challenge::create($challengeId, $user, $rij["startdatum"], $rij["einddatum"], $rij["startgewicht"], $rij["eindgewicht"]);
//        var_dump($challenge);
        $dbh = null;
        return $challenge;
    }

}
