<?php

class ToiletsManager{
    
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
    
    private function dbConnect(){

        try {
            $db = new PDO('mysql:host=localhost;dbname=refresh;charset=utf8', 'root', '');
            return $db;
            
        } catch(Exception $e)  {
            die('Erreur : '.$e->getMessage());
        }
    }  
    
}