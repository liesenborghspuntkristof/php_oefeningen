<?php
//test.php
require_once("data/BoekDAO.php");
require_once 'data/GenreDAO.php';

$dao = new BoekDAO();
$boek = $dao->getAll();
print("<pre>");
print_r($boek);
print("</pre>");
$genredao = new GenreDAO(); 
$genre = $genredao->getAll(); 
print("<pre>");
print_r($genre);
print("</pre>");
?> 


