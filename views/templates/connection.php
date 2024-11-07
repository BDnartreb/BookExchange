<?php
    /**
     * Display connection form
     * 
     */
?>

<section class="registration" role="region" aria-label="enregistrement d'un nouvel utilisateur">
    <div class="registration-forms">
        <form class="registration-form" method="post" action="index.php" role="form">
            <h1>Connexion</h1>
            <label for="email" class="label-text">Adresse email</label>
            <input class="white-fieldset" type="text" name="email" id="email" required size="30" maxlength="120">
            
            <label for="password" class="label-text">Mot de passe</label>
            <input class="white-fieldset" type="text" name="password" id="password" size="30" maxlength="120">
            
            <input type="hidden" name="action" value="connectuser">
            <input class="link-button" type="submit" value="Se connecter">
            <p> Pas de compte ? <a href="index.php?action=registration" alt="lien vers page d'inscription">Inscrivez-vous</a></p>
        </form>
    </div>
    <div class="registration-picture">
        <img src="./images/RegistrationPicture.png" alt="">
    </div>
</section>