<?php

require('model/model.php');

//Tous les projets~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//function listProjects(){
//    $projects = getProjects();
//    require('view/myProjects.php');
//}

function listProjectsRoom(){
    $room = getProjectsRoom();
    require('view/projectsRoom.php');
}

function listProjectsBathroom(){
    $bath = getProjectsBath();
    require('view/projectsBath.php');
}

//Obtenir un projet room en fonction de son Id~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getOneRoom(){
    $projectRoom = getProjectRoom($_GET['roomId']);
    $paint = getPainting();
    require('view/roomView.php');
}

//Obtenir un projet Bathroom en fonction de son Id~~~~~~~~~~~~~~~~~~~~~~
function getOneBath(){
    $projectBath = getProjectBath($_GET['bathId']);
    $paint = getPainting();
    $wc = getToilets();
    $shower = getShowers();
    $bathtub = getBathtubs();
    $sink = getSinks();
    require('view/bathView.php');
}

function singlePaint(){
    $onePaint = getOnePaint($_GET['paintId']);
    $paint = getPainting();
    require('view/onePaint.php');
}

function singleToilet(){
    $oneToilet = getOneToilet($_GET['toiletsId']);
    $wc = getToilets();
    require('view/oneToilet.php');
}

function singleShower(){
    $oneShower = getOneShower($_GET['showerId']);
    $shower = getShowers();
    require('view/oneShower.php');
}

function singleBathtub(){
    $oneBathtub = getOneBathtub($_GET['bathtubId']);
    $bathtub = getBathtubs();
    require('view/oneBathtub.php');
}

function singleSink(){
    $oneSink = getOneSink($_GET['sinkId']);
    $sink = getSinks();
    require('view/oneSink.php');
}



//Add bathroom Project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addBath($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate){
    
    $line = addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate);
    
    if($line === false){
        die('erreur addBath');
    }
    
    else{
        header('Location: view/confirmation.php?');
    }
}

//Add room project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addRoom($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate){
    $line = addRoomProject($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate);
    
    if($line === false){
        die('erreur addRoom');
    }
    
    else{
        header('Location: view/confirmation.php?');
    }
    
}

//Add user~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function addUser($userName, $userEmail, $userPassword){
    $line = newUser($userName, $userEmail, $userPassword);
    
    if($line === false){
        die('erreur addUser');
    }
    
    else{
        header('Location: index.php?');
    }
}

//Supprimer projet room~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function supprRoom(){
    $sup = delProjectRoom($_GET['roomId']);
    header('Location: index.php');        
}

function affichageDelRoom(){
    $sup = getProjectRoom($_GET['roomId']);
    require('view/confirmationDelRoom.php');
}

//Supprimer projet bath~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function supprBath(){
    $sup = delProjectBath($_GET['bathroomProjectId']);   
    header('Location: index.php');
}

function affichageDelBath(){
    $sup = getProjectBath($_GET['bathroomProjectId']);
    require('view/confirmationDelBath.php');
}

//Verify user password~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function testPassword(){
    $userPass = verifyPassword($_GET['userName']);
    header('Location: index.php?');
}