<?php

//Business/ChallengeService.php
require_once 'Data/ChallengeDAO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChallengeService
 *
 * @author kristof.liesenborghs
 */
class ChallengeService {
    
    public function getChallegeby ($username) {
        $challengeDAO = new ChallengeDAO();
        $challenge = $challengeDAO->getByUsername($username);
        return $challenge;
    }

    public function checkChallenge($username) {
        $challengeInProgress = false;
        $challengeDAO = new ChallengeDAO();
        $challenge = $challengeDAO->getByUsername($username);
        if (!is_null($challenge->getChallengeId())) {
            $challengeInProgress = TRUE;
        }
        return $challengeInProgress;
    }
    
    public function getChallengeDim($challengeId) {}

}
