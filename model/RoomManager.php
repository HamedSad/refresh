<?php

session_start();

$_SESSION['userId'] = 1;
$_SESSION['userName'] = 'Hamed';

require_once("model/Manager.php");

class RoomManager extends Manager {

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