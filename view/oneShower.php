<?php ob_start();

    $title= $oneShower['showerName'] ; ?>

<a href="index.php">Mes projets</a>
<a href="index.php?action=oneBasket">Mon panier</a>
<a href="disconnection.php">Déconnexion</a>

<div class="material">
    
    <div class="materialPic">
        <img src="<?= $oneShower['showerUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneShower['showerName'] . '<br><br>';?>
        <?= $oneShower['showerPrice'] . '€' ;?>
        
        <form action="index.php?action=addBasket&amp" method = post>

            <div>        
                <input type="hidden" id="basketProductName" name="basketProductName"  value="<?= $oneShower['showerName']; ?>">
            </div>

            <div>
                <input type="hidden" id="basketProductPrice" name="basketProductPrice" value="<?= $oneShower['showerPrice']; ?>"><br>
            </div>

            <div>
                <label for="basketProductQuantity">Quantité</label>
                <input type="text" id="basketProductQuantity" name="basketProductQuantity" size="1"><br>
            </div>

            <div>          
                <input type="hidden" id="basketProductUrlImage" name="basketProductUrlImage" value="<?= $oneShower['showerUrlImage'] ;?>"><br>
            </div>

            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>

            <div>
                <input type="submit" value="Ajouter au panier" onclick="return confirm('Valider l\'ajout de <?= $oneShower['showerName'] ;?> au panier?')">
            </div>

        </form>
        
    </div>
    
</div>


<br> Nos autres douches : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $shower->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=oneShower&amp;showerId='. $all['showerId'] . '">' .
                        '<img class="tile__img" src="' . $all['showerUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['showerName'] . '<br>' . $all['showerPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>

 <?php $content = ob_get_clean();

    require('template.php'); 