<?php

require_once("model/Manager.php");

class FavouritesManager extends Manager {
    
    public function getFavouritesRoom(){
        
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->query("SELECT * FROM favouritesroom
        INNER JOIN room
        ON roomProjectId = roomId
        WHERE favouritesroom.userId = '$userId'");
        return $req;
    }
    
    public function getFavouritesBath(){
        
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->query("SELECT * FROM favouritesbath
        INNER JOIN bathroom
        ON bathProjectId = bathroomProjectId
        WHERE favouritesbath.userId = '$userId'");
        return $req;
    }
    
    public function addFavouritesRoom($favouriteRoomName, $userId, $roomProjectId){

        $db = $this->dbConnect();

        $new = $db->prepare('INSERT INTO favouritesroom (favouriteRoomName, userId, roomProjectId) VALUES (?, ?, ?)');

        $line = $new->execute(array($favouriteRoomName, $userId, $roomProjectId));

        return $line;

    }
    
    public function addFavouritesBath($favouriteBathName, $userId, $bathProjectId){

        $db = $this->dbConnect();

        $new = $db->prepare('INSERT INTO favouritesbath (favouriteBathName, userId, bathProjectId) VALUES (?, ?, ?)');

        $line = $new->execute(array($favouriteBathName, $userId, $bathProjectId));

        return $line;

    }
    

    
    public function delFavouritesRoom($favouriteRoomId){
        $db = $this->dbConnect();    
        $sup = $db->prepare('DELETE FROM favouritesroom WHERE favouriteRoomId = ?');   
        $sup->execute(array($favouriteRoomId));   
        return $sup;
    }
    
    public function delFavouritesBath($favouriteBathId){
        $db = $this->dbConnect();
        $sup = $db->prepare('DELETE FROM favouritesbath WHERE favouriteBathId = ?');   
        $sup->execute(array($favouriteBathId));   
        return $sup;
    }
    
        
    
    
//    public function checkFavouriteRoom(){
//        
//        $db = $this->dbConnect();
//        
//        $check = $db->prepare("SELECT * FROM favouritesroom
//        INNER JOIN room
//        ON roomProjectId = roomId
//        WHERE favouritesroom.userId = '$userId'");
//        
//        $check->execute(array($userId));
//        
//           
//        
//        $testRoom = $db->prepare("SELECT * FROM favouritesroom WHERE roomProjectId = ? AND userId = '$userId'");
//        
//        $testRoom->execute(array($roomProjectId, $userId));
//        
//        return $testRoom;
//  
//    }
//      
}