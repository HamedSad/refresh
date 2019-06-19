<?php

require_once("model/Manager.php");

class ToiletsManager extends Manager {
    
    public function getToilets(){
        
        $db = $this->dbConnect(); 
        $req = $db->query('SELECT * FROM toilets ORDER BY toiletsPrice');    
        return $req;
    }

    public function getOneToilet($toiletsId){
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM toilets WHERE toiletsId = ?');
        $req->execute(array($toiletsId));
        $oneToilet = $req->fetch();
        return $oneToilet;
    }
    
}