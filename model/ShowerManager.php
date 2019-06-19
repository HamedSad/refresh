<?php

class ShowerManager{
 
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
    
    private function dbConnect(){

        try {
            $db = new PDO('mysql:host=localhost;dbname=refresh;charset=utf8', 'root', '');
            return $db;
            
        } catch(Exception $e)  {
            die('Erreur : '.$e->getMessage());
        }
    }  
}