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
//        var_dump($userLijst);
        print("<pre>");
        print_r($userLijst);
        print("</pre>");
//        var_dump($challengeLijst);
        print("<pre>");
        print_r($challengeLijst);
        print("</pre>");
        foreach ($challengeLijst as $challenge) {
        $username = $challenge->getUser()->getUsername();
        print $username;
        }

        $challengeDAO = new ChallengeDAO();
        $challenge = $challengeDAO->getById(1);
//        var_dump($challenge);
        print("<pre>");
        print_r($challenge);
        print("</pre>");
//        var_dump($weighpointLijst);
        print("<pre>");
        print_r($weighpointLijst);
        print("</pre>");
        foreach ($weighpointLijst as $weighpoint) {
            $challengeId = $weighpoint->getChallenge()->getChallengeId();
            echo $challengeId . "</br>"; 

            }
        
        ?>



    </body>
</html>
