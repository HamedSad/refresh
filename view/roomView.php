<?php ob_start();

 $title= "Mon projet " . $projectRoom['roomProjectName'] ; ?>

<div class="wrapp">
    
    <a href="index.php">Mes projets</a>
    <a href="index.php?action=oneBasket">Mon panier</a>
    <a href="index.php?action=favourites">Mes favoris</a>
    <a href="disconnection.php">Déconnexion</a>
    
    <h2>Mon projet</h2>
    
    <?= '<a class="btn btn-danger" href="index.php?action=affichageRoom&amp;roomId=' . $projectRoom['roomId'] . ' "><span class="glyphicon glyphicon-remove"></span> Supprimer ce projet </a>'; ?>
    
    <?= '<a class="btn btn-danger" href="index.php?action=getUpdate&amp;roomId=' . $projectRoom['roomId'] . ' "><span class="glyphicon glyphicon-remove"></span> Modifier ce projet </a>'; ?>
    
    <form action="index.php?action=addFavouriteRoom&amp" method = post>
            
            <div>
                <input type="hidden" id="favouriteRoomName" name="favouriteRoomName"  value="<?= $projectRoom['roomProjectName'] ?>">
            </div>
            
            <div>
                <input type="hidden" id="roomProjectId" name="roomProjectId"  value="<?= $projectRoom['roomId'] ?>">
            </div>
                        
            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>    
            
            <div>
                <input class="btn btn-warning" type="submit" value="Ajouter aux favoris">      
            </div>
           
    </form> 
    
    <br><p>Récapitulatif du projet <?= $projectRoom['roomProjectName'] ;?> </p> 
    

    <?php 

        echo 'Pièce de ' . $projectRoom['roomArea'] . ' m²<br>';
        echo 'Hauteur sur plafond de ' . $projectRoom['roomHeight'] . 'm<br>';

        if($projectRoom['roomGround'] == 5){
            echo 'Sol divers <br>';
        } else {
            echo 'Sol en ' . $projectRoom['groundName'] . '<br><br>';
            }
    ?>

    <h2>Nos recommandations</h2>

    <p>Quantité de peinture requise :</p> 

     <?php 

        $perimetre = sqrt($projectRoom['roomArea']);
        $surface = $perimetre * $projectRoom['roomHeight'];
        $surfaceRound = round($surface, 2);
        $totalLitre = round(($surface / 12)*2,2);

        echo 'Sur une base de 2 couches avec un pouvoir recouvrant de 10m²/litre, nous aurons besoin de :<br>' . $totalLitre . ' litres de peinture, soit ' ;

        if($totalLitre <= 10){
            echo ' 1 pot';
        } else if ($totalLitre <= 20 && $totalLitre > 10){
            echo ' 2 pots';
        } else if ($totalLitre <= 30 && $totalLitre > 20){
            echo ' 3 pots';
        } else if ($totalLitre <= 40 && $totalLitre > 30){
            echo ' 4 pots';
        } else if ($totalLitre <= 50 && $totalLitre > 40){
            echo ' 5 pots';
        }
        echo ' de peinture' ;

     ?>
</div>

<br><br> Nos peintures : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($choice = $paint->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=onePaint&amp;paintId=' . $choice['paintId'] . '">'.
                        '<img class="tile__img" src="' . $choice['paintUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo '<p>' . $choice['paintName'] . '<br>' . $choice['paintPrice'] . '€</p>' ;
              echo'</div>';  
            }
        
         ?>
            </div>
        </div>
    </div>
    
    <?php $content = ob_get_clean();

    require('template.php');