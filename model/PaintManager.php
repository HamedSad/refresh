<?php

class PaintManager{
    
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
    
    private function dbConnect(){

        try {
            $db = new PDO('mysql:host=localhost;dbname=refresh;charset=utf8', 'root', '');
            return $db;
            
        } catch(Exception $e)  {
            die('Erreur : '.$e->getMessage());
        }
    }  
}