<?php ob_start(); 
 
    $title= "Mes projets"; ?>
    
<div class="wrapp">
    
    <a href="index.php">Mes projets</a>
    <a href="index.php?action=oneBasket">Mon panier</a>
    <a href="index.php?action=favourites">Mes favoris</a>
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
    
    <div class="roomProject">
        <?php 

            echo "<br><br><h3>Mes projets salle de bain : </h3>"; 

            echo '<ul>';

            while($dataBathroom = $bath->fetch()){    

                if($dataBathroom['bathroomProjectId'] != 0){

                    echo '<li>' . '<a href="index.php?action=projectBath&amp;bathId=' . $dataBathroom['bathroomProjectId'] . '">' . $dataBathroom['bathroomProjectName'] . ' édité le ' . date("d/m/Y", strtotime($dataBathroom['bathroomDate'])) . '</a><br></li>';
                }
            }
            echo '</ul>';
        ?>
    </div>
    
    <div class="roomProject">
        <a href="view/createProject.php">Nouveau projet <br></a>
    </div>
    
</div>

    
    

<?php $content = ob_get_clean(); 

    require('template.php');