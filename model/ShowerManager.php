<?php

require_once("model/Manager.php");

class ShowerManager extends Manager {
 
    public function getShowers(){
        
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM shower ORDER BY showerPrice');
        return $req;
    }

    public function getOneShower($showerId){
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM shower WHERE showerId = ?');
        $req->execute(array($showerId));
        $oneShower = $req->fetch();
        return $oneShower;
    }
}