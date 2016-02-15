<?php
//weighvolution.php

require_once 'algemenefuncties.php';
require_once 'debugger.php';

session_start(); 

if (!isset($_SESSION[redirect_arrayName()]) || $_SESSION[redirect_arrayName()] !== redirect_par()) {
    header("location:aanmelden.php");
    exit(0);
} else {
    include_once 'Presentation/weighvolutionChart.php';
}
