<?php
require_once 'Data/UserDAO.php';
require_once 'Data/ChallengeDAO.php';
require_once 'Data/WeighpointDAO.php';

$userDAO = new UserDAO();
$userLijst = $userDAO->getAll();

$challengeDAO = new ChallengeDAO();
$challengeLijst = $challengeDAO->getAll();

$weighpointDAO = new WeighpointDAO();
$weighpointLijst = $weighpointDAO->getAll();
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        var_dump($userLijst);
        var_dump($challengeLijst);
        $username = $challengeLijst[0][1]->getUser()->getUsername();
        print $username;

        $challengeDAO = new ChallengeDAO();
        $challenge = $challengeDAO->getById(1);
        var_dump($challenge);
        var_dump($weighpointLijst);
        foreach ($weighpointLijst as $weighpoint) {
            $challengeId = $weighpoint->getChallenge(); 
//            var_dump ($challengeId);
            foreach ($challengeId as $challenge) {
                $id = $challenge->getChallengeId(); 
                echo $id; 
            }
        }
        ?>



    </body>
</html>
