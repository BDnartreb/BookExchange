<?php
    /**
     * Display connection form
     * 
     */
?>

<section class="registration">
    <div class="registration-forms">
        <form class="registration-form" method="post" action="index.php">
        <h1>Connexion</h1>
        <label for="email"><p>Adresse email</p></label>
        <input class="search" type="text" name="email" id="email" required size="30" maxlength="120">
        
        <label for="password"><p>Mot de passe</p></label>
        <input class="search" type="text" name="password" id="password" size="30" maxlength="120">
        
        <input type="hidden" name="action" value="connectuser">
        <input class="link-button" type="submit" value="Se connecter">
        <p> Pas de compte ? <a href="index.php?action=registration">Inscrivez-vous</a></p>
        </form>
    </div>
    <div class="registration-picture">
        <img src="./images/RegistrationPicture.png" alt="">
    </div>
</section>