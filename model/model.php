<?php

session_start();

    $_SESSION['userId'] = 1;
    $_SESSION['userName'] = 'Hamed';
//sortir tous les projets en fonction de l'utilisateur~~~~~~~~~~~~~~~~~~~~
//function getProjects(){
//   
//    $db = dbConnect();
//    
//    $req = $db->query('SELECT * FROM project 
//    
//    LEFT JOIN bathroom
//    ON project.bathroomId = bathroom.bathroomProjectId
//    
//    LEFT JOIN room
//    ON project.roomId = room.roomId
//    
//    WHERE project.userId = 1
//    
//    ORDER BY bathroom.bathroomProjectId DESC
//    
//    ');
//    
//    return $req;
//    
//}
//Get projet Room et Bathroom
function getProjectsRoom(){
   
    $db = dbConnect();
    $userId = $_SESSION['userId'] ;
    $req = $db->query("SELECT * FROM room WHERE userId = '$userId'  ORDER BY roomId DESC");
    
    return $req;   
}

function getProjectsBath(){
   
    $db = dbConnect();
    $userId = $_SESSION['userId'] ;
    $req = $db->query("SELECT * FROM bathroom WHERE userId = '$userId' ORDER BY bathroomProjectId DESC");
    
    return $req;   
}

//Get projectRoom by id~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getProjectRoom($roomId){
    $db = dbConnect();
    $userId = $_SESSION['userId'] ;
    $req = $db->prepare("SELECT * FROM room 
    
    INNER JOIN ground
    On room.roomGround = ground.groundId
    
    WHERE userId = '$userId' and roomId = ?");   
    $req->execute(array($roomId));
    $projectRoom = $req->fetch();
    
    return $projectRoom;
}

//Get projectBath by id~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getProjectBath($bathId){
    $db = dbConnect();
    $userId = $_SESSION['userId'] ;
    $req = $db->prepare("SELECT * FROM bathroom 
    
    INNER JOIN ground
    ON bathroom.bathroomGround = ground.groundId
    
    WHERE userId = '$userId' AND bathroomProjectId = ?");
    
    $req->execute(array($bathId));
    $projectBath = $req->fetch();
    
    return $projectBath;
}

//Add Bathroom project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate){
    
    $db = dbConnect();
    
    $new = $db->prepare('INSERT INTO bathroom (bathroomProjectName, bathroomArea, bathroomGround, bathroomHeight, bathroomWC, bathroomShower, bathroomBath, bathroomSink, userId, bathroomDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
    
    $line = $new->execute(array($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath,$bathroomSink, $userId));
    
    return $line;
    
}

//Add Room project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addRoomProject($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate){
    $db = dbConnect();
    
    $new = $db->prepare('INSERT INTO room (roomProjectName, roomArea, roomGround, roomHeight, userId, roomDate) VALUES (?, ?, ?, ?, ?, NOW())');
    
    $line = $new->execute(array($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId));
    
    return $line;  
}

//Get les matériaux peinture~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getPainting(){
    $db = dbConnect(); 
    $req = $db->query('SELECT * FROM paint ORDER BY paintPrice');    
    return $req;
}

function getOnePaint($paintId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM paint WHERE paintId = ?');
    $req->execute(array($paintId));
    $onePaint = $req->fetch();
    return $onePaint;
}

//Get les toilettes~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getToilets(){
    $db = dbConnect(); 
    $req = $db->query('SELECT * FROM toilets ORDER BY toiletsPrice');    
    return $req;
}

function getOneToilet($toiletsId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM toilets WHERE toiletsId = ?');
    $req->execute(array($toiletsId));
    $oneToilet = $req->fetch();
    return $oneToilet;
}

//Get les douches~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getShowers(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM shower ORDER BY showerPrice');
    return $req;
}

function getOneShower($showerId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM shower WHERE showerId = ?');
    $req->execute(array($showerId));
    $oneShower = $req->fetch();
    return $oneShower;
}

//Get les baignoires~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getBathtubs(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM bathtub ORDER BY bathtubPrice');
    return $req;
    }

function getOneBathtub($bathtubId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM bathtub WHERE bathtubId = ?');
    $req->execute(array($bathtubId));
    $oneBathtub = $req->fetch();
    return $oneBathtub;
}
//Get les sink~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getSinks(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM sink ORDER BY sinkPrice');
    return $req;
    }

function getOneSink($sinkId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM sink WHERE sinkId = ?');
    $req->execute(array($sinkId));
    $sink = $req->fetch();
    return $sink;
}
//Delete project room~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function delProjectRoom($roomId){
    $db = dbConnect();  
    $sup = $db->prepare('DELETE FROM room WHERE roomId = ?');    
    $sup->execute(array($roomId));
    return $sup;
}

//Delete project bathroom~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function delProjectBath($bathroomProjectId){
    $db = dbConnect();    
    $sup = $db->prepare('DELETE FROM bathroom WHERE bathroomProjectId = ?');   
    $sup->execute(array($bathroomProjectId));   
    return $sup;
}


//Connexion à la BDD~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function dbConnect(){
    
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=refresh;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
}