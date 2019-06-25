<?php

session_start();

require_once("model/Manager.php");

class ProjectsManager extends Manager {

    public function getProjectsBath(){
   
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->query("SELECT * FROM bathroom WHERE userId = '$userId' ORDER BY bathroomProjectId DESC");

        return $req;   
}


    public function getProjectBath($bathId){
        
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->prepare("SELECT * FROM bathroom 

        INNER JOIN ground
        ON bathroom.bathroomGround = ground.groundId

        WHERE userId = '$userId' AND bathroomProjectId = ?");

        $req->execute(array($bathId));
        $projectBath = $req->fetch();

        return $projectBath;
    }

    public function addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate){

        $db = $this->dbConnect();

        $new = $db->prepare('INSERT INTO bathroom (bathroomProjectName, bathroomArea, bathroomGround, bathroomHeight, bathroomWC, bathroomShower, bathroomBath, bathroomSink, userId, bathroomDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');

        $line = $new->execute(array($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath,$bathroomSink, $userId));

        return $line;
    }

    public function delProjectBath($bathroomProjectId){
        $db = $this->dbConnect();    
        $sup = $db->prepare('DELETE FROM bathroom WHERE bathroomProjectId = ?');   
        $sup->execute(array($bathroomProjectId));   
        return $sup;
    }
    
    
    public function getProjectsRoom(){

        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->query("SELECT * FROM room WHERE userId = '$userId'  ORDER BY roomId DESC");

        return $req;   
    }

    public function getProjectRoom($roomId){
        
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->prepare("SELECT * FROM room 

        INNER JOIN ground
        On room.roomGround = ground.groundId

        WHERE userId = '$userId' and roomId = ?");   
        $req->execute(array($roomId));
        $projectRoom = $req->fetch();

        return $projectRoom;
    }

    public function updateRoom($roomProjectName, $roomArea, $roomGround, $roomHeight, $roomId){
        
        $db = $this->dbConnect();
        $new = $db->prepare('UPDATE room SET roomProjectName = ?, roomArea = ?, roomGround = ?, roomHeight = ? WHERE roomId = ?');
        
        $new->execute(array($roomProjectName, $roomArea, $roomGround, $roomHeight, $roomId));
        
        return $new;
    }
    
    public function addRoomProject($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate){
        $db = $this->dbConnect();

        $new = $db->prepare('INSERT INTO room (roomProjectName, roomArea, roomGround, roomHeight, userId, roomDate) VALUES (?, ?, ?, ?, ?, NOW())');

        $line = $new->execute(array($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId));

        return $line;  
    }
    
    
    public function delProjectRoom($roomId){
        
        $db = $this->dbConnect();  
        $sup = $db->prepare('DELETE FROM room WHERE roomId = ?');    
        $sup->execute(array($roomId));
        return $sup;
    }

}