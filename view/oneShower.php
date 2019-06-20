<?php ob_start();

    $title= $oneShower['showerName'] ; ?>

<div class="material">
    
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
    
    <a href="index.php">Mes projets</a>
    <a href="index.php?action=oneBasket">Mon panier</a>
    <a href="disconnection.php">Déconnexion</a>
    
    <div class="materialPic">
        <img src="<?= $oneShower['showerUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneShower['showerName'] . '<br><br>';?>
        <?= $oneShower['showerPrice'] . '€' ;?>
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