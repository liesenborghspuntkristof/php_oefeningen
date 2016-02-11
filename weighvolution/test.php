<?php
require_once 'Data/UserDAO.php';
require_once 'Data/ChallengeDAO.php';
require_once 'Data/WeighpointDAO.php';
require_once 'Data/ViewerDAO.php';
require_once 'algemenefuncties.php';
require_once 'Business/UserService.php';

$userDAO = new UserDAO();
$userLijst = $userDAO->getAll();

$challengeDAO = new ChallengeDAO();
$challengeLijst = $challengeDAO->getAll();

$weighpointDAO = new WeighpointDAO();
$weighpointLijst = $weighpointDAO->getAll();

$viewerDAO = new ViewerDAO();
$viewerLijst = $viewerDAO->getAll();
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
        print("<pre>");
        print_r($viewerLijst);
        print("</pre>");
        ?>

        <?php
        $string = "foxbarrelinc";
        $ascii = string_to_ascii($string);
        echo $string . "</br>";
        var_dump($ascii);
        var_dump (string_to_ascii("!liesenborghs"));
        $check = check_valid_input($string, 6);
        var_dump($check);
        var_dump(check_valid_input($string, 6)); 
        
        $fox = $userDAO->getByUsername("foxbarrelinc"); 
        var_dump($fox); 


//        $userSvc = new UserService();
//        $service = $userSvc->checkLogin("foxbarrelinc", "adminpwd"); 
//        var_dump($service); 
        
        $par1 = $_SERVER['REMOTE_ADDR']; 
        var_dump($par1); 
        
        $par2 = gethostbyaddr($par1); 
        var_dump($par2); 
        
        var_dump(redirect_arrayName()); 
        var_dump(redirect_par()); 
        
        $_SESSION[redirect_arrayName()] = redirect_par();
        var_dump($_SESSION[redirect_arrayName()]); 
        
        var_dump($_SERVER['HTTP_USER_AGENT']); 
        
        $hashValue = passwordEncrypt("fifafo", "schildp@d"); 
        var_dump($hashValue); 



        ?>
    </body>
</html>
