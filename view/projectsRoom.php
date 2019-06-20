<?php ob_start(); 
 
    $title= "Mes projets"; ?>
    
<div class="wrapp">
    
    <a href="index.php">Mes projets</a>
    <a href="index.php?action=oneBasket">Mon panier</a>
    <a href="disconnection.php">Déconnexion</a>
    
    <h1>Mes projets</h1>
    <p>Bonjour <?= $_SESSION['userName'] ?></p>
            
    <div class="roomProject">
        <h3>Mes projets chambres : </h3>
        
        <?php
            echo '<ul>';
            
            while($dataRoom = $room->fetch()){
                if($dataRoom['roomId'] != 0){                        
                    echo '<li><a href="index.php?action=projectRoom&amp;roomId=' . $dataRoom['roomId'] . '">' . $dataRoom['roomProjectName'] . ' édité le '. date("d/m/Y", strtotime($dataRoom['roomDate'])) . '</a><br></li>';   
                }
            }
            echo '</ul>';
        ?>
    </div>
    </div>
<?php $content = ob_get_clean(); 

    require('template.php');