<?php

    $_SESSION['userId'] = 1;
    $_SESSION['userName'] = 'Hamed';

class BathroomManager{

    public function getProjectsBath(){
   
    $db = $this->dbConnect();
    $userId = $_SESSION['userId'] ;
    $req = $db->query("SELECT * FROM bathroom WHERE userId = '$userId' ORDER BY bathroomProjectId DESC");
    
    return $req;   
}


    public function getProjectBath($bathId){
        
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->prepare("SELECT * FROM bathroom 

        INNER JOIN ground
        ON bathroom.bathroomGround = ground.groundId

        WHERE userId = '$userId' AND bathroomProjectId = ?");

        $req->execute(array($bathId));
        $projectBath = $req->fetch();

        return $projectBath;
    }

    public function addBathroomProject($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate){

        $db = $this->dbConnect();

        $new = $db->prepare('INSERT INTO bathroom (bathroomProjectName, bathroomArea, bathroomGround, bathroomHeight, bathroomWC, bathroomShower, bathroomBath, bathroomSink, userId, bathroomDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');

        $line = $new->execute(array($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath,$bathroomSink, $userId));

        return $line;

    }

    public function delProjectBath($bathroomProjectId){
        $db = $this->dbConnect();    
        $sup = $db->prepare('DELETE FROM bathroom WHERE bathroomProjectId = ?');   
        $sup->execute(array($bathroomProjectId));   
        return $sup;
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