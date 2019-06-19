<?php

class SinkManager{

    public function getSinks(){
        
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM sink ORDER BY sinkPrice');
        return $req;
        }

    public function getOneSink($sinkId){
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM sink WHERE sinkId = ?');
        $req->execute(array($sinkId));
        $sink = $req->fetch();
        return $sink;
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