<?php ob_start(); 

    $title= "Mon Panier"; ?>

    <div class="wrapp">
 
        <div class="roomProject">
            
            <a href="index.php">Mes projets</a>
            <a href="index.php?action=oneBasket">Mon panier</a>
            <a href="index.php?action=favourites">Mes favoris</a>
            <a href="disconnection.php">Déconnexion</a>
            
            <h1>Mon panier</h1>
            
            <ul>
            
            <?php             
                $total = 0;   
                while($product = $oneBasket->fetch()){           
                    
                    echo '<li>';
    
                        $resultat = $product['basketProductPrice'] * $product['basketProductQuantity'];

                        echo '<img src="' . $product['basketProductUrlImage']. '">';


                        echo $product['basketProductName'] . ' ' . $product['basketProductPrice'] . '€  X '. $product['basketProductQuantity'] . ' = ' . number_format((float)$resultat, 2, '.', ''). ' €<br>'; 

                        $total = $total + $resultat;
                    
                        echo '<div class="choice" align="center">';
                            echo '<a class="btn btn-danger" href="index.php?action=delBasket&amp;basketProductId=' . $product['basketProductId'] . ' ">Supprimer</a>';
                        
                        echo '</div>';
                    
                        echo '</li>';
                        
                }
            ?>
            </ul>
            <?php 
                if($total == 0){
                    echo 'Panier vide';
                }  else { 
                    
                    echo 'Total : ' . number_format((float)$total, 2, ',', ' '). ' €';
                    }
            ?>
           
        </div>
    
    </div>

<?php $content = ob_get_clean(); 

    require('template.php');