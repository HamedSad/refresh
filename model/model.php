<?php
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

function getProjectsRoom(){
   
    $db = dbConnect();
    
    $req = $db->query('SELECT * FROM room WHERE userId = 1 ORDER BY roomId DESC');
    
    return $req;   
}

function getProjectsBath(){
   
    $db = dbConnect();
    
    $req = $db->query('SELECT * FROM bathroom WHERE userId = 1 ORDER BY bathroomProjectId DESC');
    
    return $req;   
}

//Get projectRoom by id~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getProjectRoom($roomId){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM room WHERE userId = 1 and roomId = ?');   
    $req->execute(array($roomId));
    $projectRoom = $req->fetch();
    
    return $projectRoom;
}

//Get projectBath by id~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getProjectBath($bathId){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT * FROM bathroom 
    
    INNER JOIN ground
    ON bathroom.bathroomGround = ground.groundId
    
    WHERE userId = 1 AND bathroomProjectId = ?');
    
    $req->execute(array($bathId));
    $projectBath = $req->fetch();
    
    return $projectBath;
}

//Add Bathroom project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $userId, $bathroomDate){
    
    $db = dbConnect();
    
    $new = $db->prepare('INSERT INTO bathroom (bathroomProjectName, bathroomArea, bathroomGround, bathroomHeight, bathroomWC, bathroomShower, bathroomBath, userId, bathroomDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())');
    
    $line = $new->execute(array($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $userId));
    
    return $line;
    
}

//Add Room project~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function addRoomProject($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate){
    $db = dbConnect();
    
    $new = $db->prepare('INSERT INTO room (roomProjectName, roomArea, roomGround, roomHeight, userId, roomDate) VALUES (?, ?, ?, ?, ?, NOW())');
    
    $line = $new->execute(array($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId));
    
    return $line;
    
}

//Obtenir les matériaux peinture~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getPainting(){
    $db = dbConnect(); 
    $req = $db->query('SELECT * FROM paint');    
    return $req;
}

//Obtenir les toilettes~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getToilets(){
    $db = dbConnect(); 
    $req = $db->query('SELECT * FROM toilets');    
    return $req;
}

//Obtenir les douches~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function getShowers(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM shower');
    return $req;
}

//Obtenir les baignoires~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function getBathtubs(){
    $db = dbConnect();
    $req = $db->query('SELECT * FROM  bathtub');
    return $req;
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