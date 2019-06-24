<?php ob_start();

    $title= $onePaint['paintName'] ; ?>

<a href="index.php">Mes projets</a>
<a href="index.php?action=oneBasket">Mon panier</a>
<a href="index.php?action=favourites">Mes favoris</a>
<a href="disconnection.php">Déconnexion</a>

<div class="material">    
    
    <div class="materialPic">
        <img src="<?= $onePaint['paintUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        
        <?= $onePaint['paintName'] . '<br><br>';?>
        <?= $onePaint['paintPrice'] . '€<br>' ;?>
        
        <form action="index.php?action=addBasket&amp" method = post>
            
            <div>        
                <input type="hidden" id="basketProductName" name="basketProductName"  value="<?= $onePaint['paintName']; ?>">
            </div>
            
            <div>             
                <input type="hidden" id="basketProductPrice" name="basketProductPrice" value="<?= $onePaint['paintPrice']; ?>"><br>
            </div>
            
            <div>
                <label for="basketProductQuantity">Quantité</label>
                <input type="text" id="basketProductQuantity" name="basketProductQuantity" size="1"><br>
            </div>
            
            <div>          
                <input type="hidden" id="basketProductUrlImage" name="basketProductUrlImage" value="<?= $onePaint['paintUrlImage']; ?>"><br>
            </div>
            
            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>    
            
            <div>
                <input type="submit" value="Ajouter au panier" onclick="return confirm('Valider l\'ajout de <?=  $onePaint['paintName'] ;?> au panier?')">      
            </div>
           
        </form>    
        
    </div>
    
</div>

<br><br> Nos autres peintures : <br>
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