<?php

require_once("model/Manager.php");

class BasketManager extends Manager {
    
    public function getOneBasket(){
        
        $db = $this->dbConnect();
        $userId = $_SESSION['userId'] ;
        $req = $db->query("SELECT * FROM basket WHERE userId = '$userId'");
        return $req;
    }
    
    public function addProduct($basketProductName, $basketProductPrice, $basketProductQuantity, $basketProductUrlImage, $userId){

        $db = $this->dbConnect();

        $new = $db->prepare('INSERT INTO basket (basketProductName, basketProductPrice, basketProductQuantity, basketProductUrlImage, userId) VALUES (?, ?, ?, ?, ?)');

        $line = $new->execute(array($basketProductName, $basketProductPrice, $basketProductQuantity, $basketProductUrlImage, $userId));

        return $line;

    }
    
    public function delBasket($basketProductId){
        $db = $this->dbConnect();    
        $sup = $db->prepare('DELETE FROM basket WHERE basketProductId = ?');   
        $sup->execute(array($basketProductId));   
        return $sup;
    }
    
}