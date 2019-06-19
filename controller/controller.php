<?php

//require('model/model.php');

require_once('model/RoomManager.php');
require_once('model/BathroomManager.php');
require_once('model/PaintManager.php');
require_once('model/UserManager.php');
require_once('model/ShowerManager.php');
require_once('model/ToiletsManager.php');
require_once('model/SinkManager.php');
require_once('model/BathtubManager.php');

//Tous les projet Room et Bath

function listProjectsRoom(){
    $roomManager = new RoomManager();      
    $room = $roomManager->getProjectsRoom();      
    require('view/projectsRoom.php');
}

function listProjectsBathroom(){
    $bathroomManager = new BathroomManager();    
    $bath = $bathroomManager->getProjectsBath();   
    require('view/projectsBath.php');
}

//Obtenir un projet room en fonction de son Id~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getOneRoom(){
    
    $roomManager = new RoomManager();    
    $paintManager = new PaintManager();  
    
    $projectRoom = $roomManager->getProjectRoom($_GET['roomId']);
    $paint = $paintManager->getPainting();    
    require('view/roomView.php');
}

//Obtenir un projet Bathroom en fonction de son Id~~~~~~~~~~~~~~~~~~~~~~
function getOneBath(){
    
    $bathroomManager = new BathroomManager();
    $paintManager = new PaintManager();
    $toiletsManager = new ToiletsManager();
    $showerManager = new ShowerManager();
    $bathtubManager = new BathtubManager();
    $sinkManager = new SinkManager();
    
    $projectBath = $bathroomManager->getProjectBath($_GET['bathId']);
    $paint = $paintManager->getPainting();
    $wc = $toiletsManager->getToilets();
    $shower = $showerManager->getShowers();
    $bathtub = $bathtubManager->getBathtubs();
    $sink = $sinkManager->getSinks();   
    require('view/bathView.php');
}

function singlePaint(){
    
    $paintManager = new PaintManager();   
    
    $onePaint = $paintManager->getOnePaint($_GET['paintId']);
    $paint = $paintManager->getPainting();   
    require('view/onePaint.php');
}

function singleToilet(){
    
    $toiletsManager = new ToiletsManager();
    
    $oneToilet = $toiletsManager->getOneToilet($_GET['toiletsId']);
    $wc = $toiletsManager->getToilets();  
    require('view/oneToilet.php');
}

function singleShower(){
    
    $showerManager = new ShowerManager();
    
    $oneShower = $showerManager->getOneShower($_GET['showerId']);
    $shower = $showerManager->getShowers();
    require('view/oneShower.php');
}

function singleBathtub(){
    
    $bathtubManager = new BathtubManager();
    
    $oneBathtub = $bathtubManager->getOneBathtub($_GET['bathtubId']);
    $bathtub = $bathtubManager->getBathtubs();
    require('view/oneBathtub.php');
}

function singleSink(){
    
    $sinkManager = new SinkManager();
    
    $oneSink = $sinkManager->getOneSink($_GET['sinkId']);
    $sink = $sinkManager->getSinks();
    require('view/oneSink.php');
}



//Add bathroom Project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addBath($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate){
    
    $bathroomManager = new BathroomManager();
    
    $line = $bathroomManager->addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate);
    
    if($line === false){
        die('erreur addBath');
    }
    
    else{
        header('Location: view/confirmation.php?');
    }
}

//Add room project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addRoom($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate){
    
    $roomManager = new RoomManager();
    
    $line = $roomManager->addRoomProject($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate);
    
    if($line === false){
        die('erreur addRoom');
    }
    
    else{
        header('Location: view/confirmation.php?');
    }
    
}

//Add user~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function addUser($userName, $userEmail, $userPassword){
    
    $userManager = new UserManager();
    
    $line = $userManager->newUser($userName, $userEmail, $userPassword);
    
    if($line === false){
        die('erreur addUser');
    }
    
    else{
        header('Location: index.php?');
    }
}

//Verify user password~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function testPassword(){
    
    $userManager = new UserManager();
    
    $userPass = $userManager->verifyPassword($_GET['userName']);
    header('Location: index.php?');
}

//Supprimer projet room~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function supprRoom(){
    
    $roomManager = new RoomManager();  
    
    $sup = $roomManager->delProjectRoom($_GET['roomId']);
    header('Location: index.php');        
}

function affichageDelRoom(){
    
    $roomManager = new RoomManager();
    
    $sup = $roomManager->getProjectRoom($_GET['roomId']);
    require('view/confirmationDelRoom.php');
}

//Supprimer projet bath~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function supprBath(){
    
    $bathroomManager = new BathroomManager();
    
    $sup = $bathroomManager->delProjectBath($_GET['bathroomProjectId']);   
    header('Location: index.php');
}

function affichageDelBath(){
    
    $bathroomManager = new BathroomManager();
    
    $sup = $bathroomManager->getProjectBath($_GET['bathroomProjectId']);
    require('view/confirmationDelBath.php');
}
