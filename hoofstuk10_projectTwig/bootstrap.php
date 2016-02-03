
<?php
//bootstrap.php

require_once("Libraries/Twig/Autoloader.php");

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("Presentation");
$twig = new Twig_Environment($loader);


