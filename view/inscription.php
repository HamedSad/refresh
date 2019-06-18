<?php ob_start();

    session_start();
    
    $title= "Inscription"; ?>
    
    <div class="formAddBath">
        <h1>Inscription</h1>
        <form action="../index.php?action=addUser&amp" method="post">   
                      
            <div>
                <label for="userName">Nom *</label>
                <input type="text" id="userName" name="userName" size="40"><br><br>
            </div>  

            <div>
                <label for="userEmail">Email *</label>
                <input type="email" id="userEmail" name="userEmail" size="40"><br><br>
            </div>
            
            <div>
                <label for="userPassword">Mot de passe *</label>
                <input type="password" id="userPassword" name="userPassword" size="40">
            </div><br>
            
            <div>
                <label for="userPassword2">Confirmation du mot de passe *</label>
                <input type="password" id="userPassword2" name="userPassword2" size="40">
            </div><br>
            
            

            <div>
                <input type="submit" value="S'inscrire">
            </div>
            
  </form>

    </div>
<?php $content = ob_get_clean();

    require('template.php');