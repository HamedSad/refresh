<?php ob_start();  

    session_start();
    
    $title= "Confirmation"; ?>
    
    <div class="confirmation">

        <p>Félicitations <?php echo $_SESSION['userName'] ; ?>  ! <br>
      Vos données ont bien été enregistrées, rendez-vous dès à présent dans la rubrique mes projets pour découvrir notre expertise pour mener à bien votre projet</p>
        
        <div style="text-align: center">
            <img src="https://www.corneloup.com/wp-content/uploads/2015/02/engrenages.gif" align="center"><br>
        </div>
        <a href="../index.php">Mes projets</a>
    
    </div>



<?php $content = ob_get_clean(); 

    require('template.php');