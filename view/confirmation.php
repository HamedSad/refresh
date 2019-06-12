<?php ob_start(); ?>

<?php 

    session_start();
?>

<?php $title= "Confirmation"; ?>
    
    <div class="confirmation">

        <p>Félicitations <?php echo $_SESSION['userName'] ; ?>  ! <br>
      Vos données ont bien été enregistrées, rendez-vous dès à présent dans la rubrique mes projets pour découvrir notre expertise pour mener à bien votre projet</p>
        
        <a href="../index.php">Mes projets</a>
    
    </div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>