<?php
    /**
     * Display registration form
     * 
     */
?>

<section class="registration" role="region" aria-label="page de connexion">
    <div class="registration-forms">
        <h1>Inscription</h1>
        <form class="registration-form" method="post" action="index.php" role="form">
            <div class="registration-form">
                <label for="pseudo"  class="label-text">Pseudo</label>   
                <input class="white-fieldset" type="text" name="pseudo" id="pseudo" required size="30" maxlength="120">

                <label for="email" class="label-text">Adresse Email</label>  
                <input class="white-fieldset" type="text" name="email" id="email" required size="30" maxlength="120">
               
                <label for="password"  class="label-text">Mot de passe</label> 
                <input class="white-fieldset" type="text" name="password" id="password" required size="30" maxlength="120">
            </div>
            <div class="submit-button">
                <input type="hidden" name="action" value="adduser">
                <input class="link-button" type="submit" value="S'inscrire">
                <p>Déjà inscrit ? <a href="index.php?action=connection" alt="lien vers page de connexion">Connectez-vous</a></p>
            </div>
        </form>
    </div>
    <div class="registration-picture">
        <img src="./images/RegistrationPicture.png" alt="">
    </div>
</section>