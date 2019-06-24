<?php ob_start();

    $title= $oneSink['sinkName'] ; ?>

<a href="index.php">Mes projets</a>
<a href="index.php?action=oneBasket">Mon panier</a>
<a href="index.php?action=favourites">Mes favoris</a>
<a href="disconnection.php">Déconnexion</a>

<div class="material">
    
    <div class="materialPic">
        <img src="<?= $oneSink['sinkUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneSink['sinkName'] . '<br><br>';?>
        <?= $oneSink['sinkPrice'] . '€' ;?>
        
        <form action="index.php?action=addBasket&amp" method = post>

            <div>        
                <input type="hidden" id="basketProductName" name="basketProductName" value="<?= $oneSink['sinkName']; ?>">
            </div>

            <div>
                <input type="hidden" id="basketProductPrice" name="basketProductPrice" value="<?= $oneSink['sinkPrice']; ?>"><br>
            </div>

            <div>
                <label for="basketProductQuantity">Quantité</label>
                <input type="text" id="basketProductQuantity" name="basketProductQuantity" size="1"><br>
            </div>

            <div>          
                <input type="hidden" id="basketProductUrlImage" name="basketProductUrlImage" value="<?= $oneSink['sinkUrlImage'] ;?>"><br>
            </div>

            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>

            <div>
                <input type="submit" value="Ajouter au panier" onclick="return confirm('Valider l\'ajout de <?= $oneSink['sinkName'] ;?> au panier?')">
            </div>

        </form>
        
    </div>
    
</div>

<br> Nos autres lavabos : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $sink->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=oneSink&amp;sinkId='. $all['sinkId'] . '">' .
                        '<img class="tile__img" src="' . $all['sinkUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['sinkName'] . '<br>' . $all['sinkPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>

 <?php $content = ob_get_clean();

    require('template.php'); 