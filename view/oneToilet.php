<?php ob_start();

    $title= $oneToilet['toiletsName'] ; ?>

<a href="index.php">Mes projets</a>
<a href="index.php?action=oneBasket">Mon panier</a>
<a href="index.php?action=favourites">Mes favoris</a>
<a href="disconnection.php">Déconnexion</a>

<div class="material">
    
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
    
    <div class="materialPic">
        <img src="<?= $oneToilet['toiletsUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneToilet['toiletsName'] . '<br><br>';?>
        <?= $oneToilet['toiletsPrice'] . '€' ;?>
     
        <form action="index.php?action=addBasket&amp" method = post>

            <div>        
                <input type="hidden" id="basketProductName" name="basketProductName" value="<?= $oneToilet['toiletsName']; ?>">
            </div>

            <div>
                <input type="hidden" id="basketProductPrice" name="basketProductPrice" value="<?= $oneToilet['toiletsPrice']; ?>"><br>
            </div>

            <div>
                <label for="basketProductQuantity">Quantité</label>
                <input type="text" id="basketProductQuantity" name="basketProductQuantity" size="1"><br>
            </div>

            <div>          
                <input type="hidden" id="basketProductUrlImage" name="basketProductUrlImage" value="<?= $oneToilet['toiletsUrlImage'] ;?>"><br>
            </div>

            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>

            <div>
                <input type="submit" value="Ajouter au panier" onclick="return confirm('Valider l\'ajout de <?= $oneToilet['toiletsName'] ;?> au panier?')">
            </div>

        </form>
    </div>    
</div>
    
    <br> Nos toilettes : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $wc->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=oneToilet&amp;toiletsId='. $all['toiletsId'] . '">' .
                        '<img class="tile__img" src="' . $all['toiletsUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['toiletsName'] . '<br>' . $all['toiletsPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>

 <?php $content = ob_get_clean();

    require('template.php'); 