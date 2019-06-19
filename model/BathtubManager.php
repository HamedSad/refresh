<?php

require_once("model/Manager.php");

class BathtubManager extends Manager {

    public function getBathtubs(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM bathtub ORDER BY bathtubPrice');
        return $req;
        }

    public function getOneBathtub($bathtubId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM bathtub WHERE bathtubId = ?');
        $req->execute(array($bathtubId));
        $oneBathtub = $req->fetch();
        return $oneBathtub;
    }
    
}