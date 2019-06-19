<?php

require_once("model/Manager.php");

class SinkManager extends Manager {

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
    
}