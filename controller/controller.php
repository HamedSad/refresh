<?php

require_once('model/PaintManager.php');
require_once('model/UserManager.php');
require_once('model/ShowerManager.php');
require_once('model/ToiletsManager.php');
require_once('model/SinkManager.php');
require_once('model/BathtubManager.php');
require_once('model/BasketManager.php');
require_once('model/FavouritesManager.php');
require_once('model/ProjectsManager.php');

//Projects~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function listProjects(){
    $projectsManager = new ProjectsManager();
    
    $bath = $projectsManager->getProjectsBath();
    $room = $projectsManager->getProjectsRoom();
    require('view/projects.php');
    
}


//Get room projet by Id
function getOneRoom(){
    
    $roomManager = new ProjectsManager();    
    $paintManager = new PaintManager();  
    
    $projectRoom = $roomManager->getProjectRoom($_GET['roomId']);
    $paint = $paintManager->getPainting();    
    require('view/roomView.php');
}

//Add room project
function addRoom($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate){
    
    $roomManager = new ProjectsManager();
    
    $line = $roomManager->addRoomProject($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate);
    
    if($line === false){
        die('erreur addRoom');
    }
    
    else{
        header('Location: view/confirmation.php?');
    }
    
}

//Del room project
function supprRoom(){
    
    $roomManager = new ProjectsManager();  
    
    $sup = $roomManager->delProjectRoom($_GET['roomId']);
    header('Location: index.php');        
}

function affichageDelRoom(){
    
    $roomManager = new ProjectsManager();
    
    $sup = $roomManager->getProjectRoom($_GET['roomId']);
    require('view/confirmationDelRoom.php');
}

//Projects bathroom~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

//Get project bathroom by Id
function getOneBath(){
    
    $bathroomManager = new ProjectsManager();
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

//Add project bathroom
function addBath($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate){
    
    $bathroomManager = new ProjectsManager();
    
    $line = $bathroomManager->addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate);
    
    if($line === false){
        die('erreur addBath');
    }
    
    else{
        header('Location: view/confirmation.php?');
    }
}

//Del project bathroom
function supprBath(){
    
    $bathroomManager = new ProjectsManager();
    
    $sup = $bathroomManager->delProjectBath($_GET['bathroomProjectId']);   
    header('Location: index.php');
}

function affichageDelBath(){
    
    $bathroomManager = new ProjectsManager();
    
    $sup = $bathroomManager->getProjectBath($_GET['bathroomProjectId']);
    require('view/confirmationDelBath.php');
}

//Materials~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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


//Add user~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function addUser($userName, $userEmail, $userPassword, $userDateInscription){
    
    $userManager = new UserManager();
    
    $line = $userManager->newUser($userName, $userEmail, $userPassword, $userDateInscription);
    
    if($line === false){
        die('erreur addUser');
    }
    
    else{
        header('Location: view/connexion.php?');
    }
}

//Basket ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function basket(){   
    $basketManager = new BasketManager();   
    $oneBasket = $basketManager->getOneBasket();  
    require('view/basket.php');
}

//Add product basket
function addBasket($basketProductName, $basketProductPrice, $basketProductQuantity, $basketProductUrlImage, $userId){
    
    $basketManager = new BasketManager();
    
    $line = $basketManager->addProduct($basketProductName, $basketProductPrice, $basketProductQuantity, $basketProductUrlImage, $userId);
    
    if($line === false){
        die('erreur ajout dans le panier');
    }
    
    else {
        header('Location: index.php?action=addFavouriteRoom'); 
    }
}

//Del product basket
function delBasket(){
    $basketManager = new BasketManager();
    $sup = $basketManager->delBasket($_GET['basketProductId']);
    $affichage = $basketManager->getOneBasket();
    header('Location: index.php?action=oneBasket');
}

//Favourites~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function favourites(){
    $favouritesManager = new FavouritesManager();
    //$myFavouritesRoom = $favouritesManager->getFavouritesRoom();
    $myFavouritesBath = $favouritesManager->getFavouritesBath();
    $myFavouritesRoom = $favouritesManager->getFavouritesRoom();
    require('view/favourites.php');
}

function addFavouriteRoom($favouriteRoomName, $userId, $roomProjectId){
    
    $favouriteManager = new FavouritesManager();
    
    $line = $favouriteManager->addFavouritesRoom($favouriteRoomName, $userId, $roomProjectId);
 
    if($line === false){
        die('erreur ajout en favoris');
    }
    
    else {
        header('Location:' . $_SERVER['HTTP_REFERER']); 
       
    }  
}


function addFavouriteBath($favouriteBathName, $userId, $bathProjectId){
    
    $favouriteManager = new FavouritesManager();
    
    $line = $favouriteManager->addFavouritesBath($favouriteBathName, $userId, $bathProjectId);
 
    if($line === false){
        die('erreur ajout en favoris');
    }
    
    else {
        header('Location:' . $_SERVER['HTTP_REFERER']); 
    }   
}

function delFavouriteRoom(){
    $favourite = new FavouritesManager();
    $sup = $favourite->delFavouritesRoom($_GET['favouriteRoomId']);
    header('Location: index.php?action=favourites');
    
}

function delFavouriteBath(){
    $favourite = new FavouritesManager();
    $sup = $favourite->delFavouritesBath($_GET['favouriteBathId']);
    header('Location: index.php?action=favourites');
    
}


//Disconnection~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function deconnexion(){
    session_start();
    session_destroy();
    header('Location: ../connexion.php');
    exit;
}
