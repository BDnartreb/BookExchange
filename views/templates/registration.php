<?php
    /**
     * Display registration form
     * 
     */
?>

<section class="registration">
    <div class="registration-forms">
        <h1>Inscription</h1>
        <form class="registration-form" method="get" action="index.php">
            <div>
                <label for="pseudo"><p>Pseudo</p></label>   
                <input class="search" type="text" name="pseudo" id="pseudo" required size="30" maxlength="120">

                <label for="pseudo"><p>Adresse Email</p></label>  
                <input class="search" type="text" name="email" id="email" required size="30" maxlength="120">
               
                <label for="pseudo"><p>Mot de passe</p></label> 
                <input class="search" type="text" name="password" id="password" required size="30" maxlength="120">
            </div>
            <div class="submit-button">
                <input type="hidden" name="action" value="adduser">
                <input class="link-button" type="submit" value="S'inscrire">
                <p>Déjà inscrit ? <a href="index.php?action=connection">Connectez-vous</a></p>
            </div>
        </form>
    </div>
    <div class="registration-picture">
        <img src="./images/RegistrationPicture.png" alt="">
    </div>
</section>