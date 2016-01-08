<?php 

session_start(); 
require_once 'Chatlog.php';


$chatlog = new Chatlog();

if (!isset($_SESSION["check"])) {
    $_SESSION["check"] = "dkjfiejkdjfiekmmqmqmqeii425"; 
}

if (!isset($_SESSION["nickname"])) {
    $user = rand(111, 999);
    $_SESSION["nickname"] = "p" . $user;
}

if (isset($_GET["action"]) && $_GET["action"] == "new" && $_SESSION["check"] != $_POST["bericht"] . "=old"){
    $chatlog->createChat($_SESSION["nickname"], $_POST["bericht"]); 
}

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
        <title>chatMessenger</title>
        <style>
            body {margin: 0 0.5em; position: relative;}
            textarea {display: block; width: calc(100% - 0.5em); height: 7.5em;}
            textarea {margin-top: 0.2em;}
            input {margin-top: 0.5em;}
            #chatlog {height: calc(100vh - 10em - 3em - 2em); border: 0.1em solid lightgray; overflow:auto; }
            #invoer {  height: 10em; position: fixed; bottom: 0; left: 0.5em; right: 00.5em; };
            form {position: fixed; bottom: 0;height: 100vw;}
            #titel { display: block; height: 3em;}
            pre {margin: 0; padding: 1em;}
            pre:nth-child(even) {background-color: lightgray;}
            .them {text-align: right; color: red;}
        </style>
    </head>
    <body>
        <div id="titel"><h1>Berichten</h1></div>
        <div id="chatlog">
        <?php
        $lijst = $chatlog->getChat(); 
        foreach ($lijst as $chat) {
				$nickname = $chat->getAuteur();
				$boodschap = $chat->getBoodschap();
                                print("<pre "); 
                                if ($nickname != $_SESSION["nickname"]) {
                                    print ("class=them"); 
                                }                                                                           
                                print (">" . $nickname . ">       " . $boodschap . "</pre>"); 
        }
        
        ?>
        </div>
        <div id="invoer">
            <form action="chatmessenger.php?action=new" method="post">
            Bericht: (your nickname: <?php echo ($_SESSION["nickname"] . ")"); ?>
            <textarea name="bericht" required="" placeholder="schrijf een bericht" autofocus=""></textarea>
            <input type="submit" value="Versturen">
        </form>
        </div>
    </body>
</html>
