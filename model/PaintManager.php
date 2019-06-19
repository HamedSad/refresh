<?php

require_once("model/Manager.php");

class PaintManager extends Manager {
    
    public function getPainting(){
        $db = $this->dbConnect(); 
        $req = $db->query('SELECT * FROM paint ORDER BY paintPrice');    
        return $req;
    }

    public function getOnePaint($paintId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM paint WHERE paintId = ?');
        $req->execute(array($paintId));
        $onePaint = $req->fetch();
        return $onePaint;
    }
     
}