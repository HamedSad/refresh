<?php ob_start(); 

    $title= "Mes Favoris"; ?>

    <div class="wrapp">
 
        <div class="roomProject">
            
            <a href="index.php">Mes projets</a>
            <a href="index.php?action=oneBasket">Mon panier</a>
            <a href="index.php?action=favourites">Mes favoris</a>
            <a href="disconnection.php">Déconnexion</a>
            
            <h1>Mes favoris</h1>
            
            <ul>
            
            <?php             
                while($favouritesRoom = $myFavouritesRoom->fetch()){                    
                    echo '<li>';
                        echo '<a href="index.php?action=projectRoom&amp;roomId=' . $favouritesRoom['roomId'] . '">'. $favouritesRoom['favouriteRoomName'] . '</a>';
                    echo '</li>';            
                }
            ?>
                
            <?php             
                while($favouritesBath = $myFavouritesBath->fetch()){                    
                    echo '<li>';
                        echo '<a href="index.php?action=projectBath&amp;bathId=' . $favouritesBath['bathroomProjectId'] . '">'. $favouritesBath['favouriteBathName'] . '</a>';
                    echo '</li>';            
                }
            ?>
            </ul> 
        </div>
    </div>

<?php $content = ob_get_clean(); 

    require('template.php');

