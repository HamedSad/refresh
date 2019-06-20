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
require_once('model/BasketManager.php');

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

//Verify user password~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function testPassword(){
    
    $userManager = new UserManager();
    
    $userPass = $userManager->verifyPassword($_GET['userName']);
    
    if(isset($_POST["userName"]) && isset($_POST["userPassword"])){
    
    $hash = $password;
    $correctPassword = password_verify($_POST["userName"], $hash);
        
    if($correctPassword){
        header('Location: index.php?');
    }
    else{
        echo 'Mot de passe ou nom d\'utilisateur invalide';
    }
    
    }
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

//Les produits du panier ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

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
        header('Location:' . $_SERVER['HTTP_REFERER']); 
    }
}
//Supprimer un element du panier

function delBasket(){
    $basketManager = new BasketManager();
    $sup = $basketManager->delBasket($_GET['basketProductId']);
    $affichage = $basketManager->getOneBasket();
    header('Location: index.php?action=oneBasket');
}

function deconnexion(){
    session_start();
    session_destroy();
    header('Location: ../connexion.php');
    exit;
}
