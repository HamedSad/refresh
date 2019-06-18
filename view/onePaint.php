<?php ob_start();

    $title= $onePaint['paintName'] ; ?>

<div class="material">
    
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
    
    <div class="materialPic">
        <img src="<?= $onePaint['paintUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $onePaint['paintName'] . '<br><br>';?>
        <?= $onePaint['paintPrice'] . '€' ;?>
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