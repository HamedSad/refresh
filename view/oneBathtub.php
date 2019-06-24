<?php ob_start();

    $title= $oneBathtub['bathtubName'] ; ?>

<a href="index.php">Mes projets</a>
<a href="index.php?action=oneBasket">Mon panier</a>
<a href="index.php?action=favourites">Mes favoris</a>
<a href="disconnection.php">Déconnexion</a>

<div class="material">
    
    <div class="materialPic">
        <img src="<?= $oneBathtub['bathtubUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneBathtub['bathtubName'] . '<br><br>';?>
        <?= $oneBathtub['bathtubPrice'] . '€' ;?>
        
        <form action="index.php?action=addBasket&amp" method = post>

            <div>        
                <input type="hidden" id="basketProductName" name="basketProductName" value="<?= $oneBathtub['bathtubName']; ?>">
            </div>

            <div>
                <input type="hidden" id="basketProductPrice" name="basketProductPrice" value="<?= $oneBathtub['bathtubPrice'] ?>"><br>
            </div>

            <div>
                <label for="basketProductQuantity">Quantité</label>
                <input type="text" id="basketProductQuantity" name="basketProductQuantity" size="1"><br>
            </div>

            <div>          
                <input type="hidden" id="basketProductUrlImage" name="basketProductUrlImage" value="<?= $oneBathtub['bathtubUrlImage'] ;?>"><br>
            </div>

            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>

            <div>
                <input type="submit" value="Ajouter au panier" onclick="return confirm('Valider l\'ajout de <?= $oneBathtub['bathtubName'] ;?> au panier?')">
            </div>

        </form>
        
    </div>
    
</div>

<br> Nos autres baignoires : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $bathtub->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=oneBathtub&amp;bathtubId='. $all['bathtubId'] . '">' .
                        '<img class="tile__img" src="' . $all['bathtubUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['bathtubName'] . '<br>' . $all['bathtubPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>

 <?php $content = ob_get_clean();

    require('template.php'); 