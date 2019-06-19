<?php

class UserManager{
 
    public function newUser($userName, $userEmail, $userPassword){
        $db = $this->dbConnect();
        $new = $db->prepare('INSERT INTO user (userName, userEmail, userPassword) VALUES (?, ?, ?)');
        $line = $new->execute(array($userName, $userEmail, $userPassword));

        return $line;
    }

    public function verifyPassword($userName){
        
        $db = $this->dbConnect();
        $pass = $db->prepare("SELECT userPassword FROM user WHERE userName = ?");
        $pass->execute(array($userName));
        $user = $pass->fetch();
        return $user;
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