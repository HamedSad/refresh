<?php

class BathtubManager{

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
    
    private function dbConnect(){

        try {
            $db = new PDO('mysql:host=localhost;dbname=refresh;charset=utf8', 'root', '');
            return $db;
            
        } catch(Exception $e)  {
            die('Erreur : '.$e->getMessage());
        }
    }  
}