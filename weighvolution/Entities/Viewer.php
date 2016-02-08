<?php
//Entities/Viewer.php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Viewer
 *
 * @author kristof.liesenborghs
 */
class Viewer {
    
    private static $idMap = array(); 
    
    private $viewerId; 
    private $user; //= obj. User
    private $allowedViewer; 
    
    private function __construct($viewerId, $user, $allowedViewer) {
        $this->viewerId = $viewerId;
        $this->user = $user;
        $this->allowedViewer = $allowedViewer;
    }
    
    public static function create($viewerId, $user, $allowedViewer) {
        if(!isset(self::$idMap[$viewerId])) {
            self::$idMap[$viewerId] = new Viewer($viewerId, $user, $allowedViewer); 
        }
        return self::$idMap[$viewerId]; 
    }


    function getViewerId() {
        return $this->viewerId;
    }

    function getUser() {
        return $this->user;
    }

    function getAllowedViewer() {
        return $this->allowedViewer;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setAllowedViewer($allowedViewer) {
        $this->allowedViewer = $allowedViewer;
    }


}
