<?php

require_once("model/Manager.php");

class UserManager extends Manager{
 
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
}
