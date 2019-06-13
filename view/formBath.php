<?php ob_start();

    session_start();
 
    setlocale(LC_TIME, 'fr_FR');
    $bathroomDate = strftime('%d/%m/%Y %H:%M:%S');
    
    $title= "Création de votre projet salle de bain"; ?>
    
    
    
    <div class="formAddBath">
        <h1>Création de votre projet salle de bain</h1>
        <form action="../index.php?action=addBath&amp" method="post">   
                      
            <div>
                <label for="bathroomProjectName">Nom du projet *</label>
                <input type="text" id="bathroomProjectName" name="bathroomProjectName" size="40" required><br><br>
            </div>  

            <div>
                <label for="bathroomArea">Superficie de la salle de bain (en m²) *</label>
                <input type="number" id="bathroomArea" name="bathroomArea" size="5" step="0.01" required><br><br>
            </div>
            
            <div>
                <label for="bathroomHeight">Hauteur sur plafond (en m) *</label>
                <input type="number" id="bathroomHeight" name="bathroomHeight" size="5" step="0.01" required>
            </div><br>

            <div>
                <label for="bathroomGround">Type de sol</label>
                <select id="bathroomGround" name="bathroomGround" ><br>
                    <option value = 1>Carrelage</option>
                    <option value = 2>Lino</option>
                    <option value = 3>Parquet</option>
                    <option value = 4>Moquette</option>
                    <option value = 5>Autre</option>
                </select>
            </div><br>

            <div>
                <label for="bathroomWC">Souhaitez-vous installer des WC ?</label>
                <select id="bathroomWC" name="bathroomWC">
                    <option value = 0>Non</option>
                    <option value = 1>Oui</option>
                </select>
            </div><br>

            <div>
                <label for="bathroomShower">Souhaitez-vous installer une douche ?</label>
                <select id="bathroomShower" name="bathroomShower">
                    <option value = 0>Non</option>
                    <option value = 1>Oui</option>
                </select>
            </div><br>

            <div>
                <label for="bathroomBath">Souhaitez-vous installer une baignoire ?</label>
                <select id="bathroomBath" name="bathroomBath"><br>
                    <option value = 0>Non</option>
                    <option value = 1>Oui</option>
                </select>
            </div><br>

            <div class=userId>
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>
            
            <input type="hidden" name="bathroomDate" value="<?php echo $bathroomDate ; ?>" >

            <div>
                <input type="submit" value="Valider">
            </div>


        </form>

    </div>
<?php $content = ob_get_clean();

    require('template.php');