<?php

require_once("model/Manager.php");

class UserManager extends Manager{
    
    public $userName;
    public $userEmail;
    public $userPassword;
    public $userDateInscription;
    
 
    public function newUser($userName, $userEmail, $userPassword, $userDateInscription){
        $db = $this->dbConnect();
        $new = $db->prepare('INSERT INTO user (userName, userEmail, userPassword, userDateInscription) VALUES (?, ?, ?, NOW())');
        $line = $new->execute(array($userName, $userEmail, $userPassword));

        return $line;
    }

    public function verifyPassword($userName){
        
        $db = $this->dbConnect();
        $pass = $db->prepare("SELECT userId, userPassword FROM user WHERE userName = ?");
        $pass->execute(array($userName));
        $user = $pass->fetch();
        return $user;
            
    }
}