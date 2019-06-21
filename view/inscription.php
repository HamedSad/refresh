<?php ob_start();

    session_start();

    setlocale(LC_TIME, 'fr_FR');
    $userDateInscription = strftime('%d/%m/%Y %H:%M:%S');
    
    $title= "Inscription"; 
?>
    
    <div class="formAddBath">
        <h1>Inscription</h1>
        <form action="../index.php?action=addUser&amp" method="post">   
                      
            <div>
                <label for="userName">Nom *</label>
                <input type="text" id="userName" name="userName" size="40" required><br><br>
            </div>  

            <div>
                <label for="userEmail">Email *</label>
                <input type="email" id="userEmail" name="userEmail" size="40" required><br><br>
            </div>
            
            <div>
                <label for="userPassword">Mot de passe *</label>
                <input type="password" id="userPassword" name="userPassword" size="40" required>
            </div><br>
            
            <div>
                <label for="userPassword2">Confirmation du mot de passe *</label>
                <input type="password" id="userPassword2" name="userPassword2" size="40" required>
            </div><br>
            
            <input type="hidden" name="userDateInscription" value="<?= $userDateInscription ; ?>" >

            <div>
                <input type="submit" value="S'inscrire">
            </div><br>
            Déjà inscrit.e? <a href="connexion.php">Connexion</a> 
        </form>
        
        
    </div>
<?php $content = ob_get_clean();

    require('template.php');