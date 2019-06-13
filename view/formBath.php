<?php ob_start(); ?>

<?php 

    session_start();
 
    setlocale(LC_TIME, 'fr_FR');
    $bathroomDate = strftime('%d/%m/%Y %H:%M:%S');
    echo "Nous somme le : $bathroomDate";
?>

<?php $title= "Création de votre projet salle de bain"; ?>

    <div class="formAddBath">
        <form action="../index.php?action=addBath&amp" method="post">   
           
            <?php
            
            echo $_SESSION['userName'];
            echo $_SESSION['userId']; 
            
            ?>
            
            
            <div>
                <label for="bathroomProjectName">Nom du projet</label><br>
                <input type="text" id="bathroomProjectName" name="bathroomProjectName"><br><br>
            </div>  

            <div>
                <label for="bathroomArea">Superficie de votre salle de bain (en m²)</label><br>
                <input type="text" id="bathroomArea" name="bathroomArea"><br><br>
            </div>

            <div>
                <label for="bathroomGround">Type de sol</label><br>
                <select id="bathroomGround" name="bathroomGround"><br>
                    <option value = 1>Carrelage</option>
                    <option value = 2>Lino</option>
                    <option value = 3>Parquet</option>
                    <option value = 4>Moquette</option>
                    <option value = 5>Autre</option>
                </select>
            </div>
            
            <div>
                <label for="bathroomHeight">Hauteur sur plafont (en m)</label><br>
                <input type="text" id="bathroomHeight" name="bathroomHeight"><br><br>
            </div>

            <div>
                <label for="bathroomWC">Souhaitez-vous installer des WC ?</label><br>
                <select id="bathroomWC" name="bathroomWC"><br>
                    <option value = 0>Non</option>
                    <option value = 1>Oui</option>
                </select>
            </div>

            <div>
                <label for="bathroomShower">Souhaitez-vous installer une douche ?</label><br>
                <select id="bathroomShower" name="bathroomShower"><br>
                    <option value = 0>Non</option>
                    <option value = 1>Oui</option>
                </select>
            </div>

            <div>
                <label for="bathroomBath">Souhaitez-vous installer une baignoire ?</label><br>
                <select id="bathroomBath" name="bathroomBath"><br>
                    <option value = 0>Non</option>
                    <option value = 1>Oui</option>
                </select>
            </div>

            <div>
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>
            
            <input type="hidden" name="bathroomDate" value="<?php echo $bathroomDate ; ?>" >

            <div>
                <input type="submit" value="Valider">
            </div>


        </form>

    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>