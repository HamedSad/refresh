<?php ob_start();

    $title= $oneBathtub['bathtubName'] ; ?>

<div class="material">
    
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
    
    <a href="index.php">Mes projets</a>
    <a href="index.php?action=oneBasket">Mon panier</a>
    <a href="disconnection.php">Déconnexion</a>
    
    <div class="materialPic">
        <img src="<?= $oneBathtub['bathtubUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneBathtub['bathtubName'] . '<br><br>';?>
        <?= $oneBathtub['bathtubPrice'] . '€' ;?>
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