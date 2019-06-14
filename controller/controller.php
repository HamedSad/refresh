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

//Obtenir un projet room en fonction de son Id~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getOneRoom(){
    $projectRoom = getProjectRoom($_GET['roomId']);
    $paint = getPainting();
    require('view/roomView.php');
}

//Obtenir un projet Bathroom en fonction de son Id~~~~~~~~~~~~~~~~~~~~~~~~~~
function getOneBath(){
    $projectBath = getProjectBath($_GET['bathId']);
    $paint = getPainting();
    $wc = getToilets();
    $shower = getShowers();
    $bathtub = getBathtubs();
    $sink = getSinks();
    require('view/bathView.php');
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

//Fonction supprimer~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function suppr(){
    $sup = delProjectRoom($_GET['roomId']);
    header('Location: index.php');        
}

function supprBath(){
    $sup = delProjectBath($_GET['bathroomProjectId']);
    header('Location: index.php');
}