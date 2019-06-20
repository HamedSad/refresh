<?php ob_start();  
  
    $title= 'Confirmation de suppression du projet ' . $sup['roomProjectName']; ?>
    
    <div class="confirmation">

        <p>Etes-vous certain de vouloir supprimer le projet <?= $sup['roomProjectName'] ?> ?</p><br>
        
        <div class="choice" align="center">
            <?= '<a class="btn btn-danger" href="index.php?action=delProjectRoom&amp;roomId=' . $sup['roomId'] . ' "><span class="glyphicon glyphicon-remove"></span> Oui </a>'; ?>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Non</a>
        </div>
        
        <div style="text-align: center">
            <img src="https://cdn.dribbble.com/users/164889/screenshots/1192618/loading-red-spot.gif" align="center"><br>
        </div>
        
        
        
        
    
    </div>



<?php $content = ob_get_clean(); 

    require('template.php');