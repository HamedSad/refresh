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
    
//    public function checkFavouriteRoom(){
//        
//        $db = $this->dbConnect();
//        
//        $new = $db->prepare("SELECT * FROM favouritesroom WHERE roomProjectId = ? AND userId = '$userId'");
//        
//        $new->execute(array($roomProjectId, $userId));
//        
//        if($new->rowCount() == 1){
//            
//            
//        } else {
//            
//            
//        }
//        
//        
//        
//    }
    
    public function delFavouritesRoom($favouriteRoomId){
        $db = $this->dbConnect();    
        $sup = $db->prepare('DELETE FROM favouritesroom WHERE favouriteRoomId = ?');   
        $sup->execute(array($favouriteRoomIdId));   
        return $sup;
    }
    
    public function delFavouritesBath($favouriteBathId){
        $db = $this->dbConnect();    
        $sup = $db->prepare('DELETE FROM favouritesbath WHERE favouriteBathId = ?');   
        $sup->execute(array($favouriteBathId));   
        return $sup;
    }
    
}