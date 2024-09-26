<?php
    /**
     * Display registration form
     * 
     */
?>

<section class="registration">
    <div class="registration-forms">
        <form class="registration-form" method="get" action="index.php">
        <h1>Connexion</h1>
        <label for="email"><p>Adresse email</p></label>
        <input class="search" type="text" name="email" id="email" required size="30" maxlength="120">
        
        <label for="email"><p>Mot de passe</p></label>
        <input class="search" type="text" name="password" id="" size="30" maxlength="120">

        <input type="hidden" name="action" value="userprofil">
        <input class="registration-button" type="submit" value="S'inscrire">
        <p> Pas de compte ? <a href="index.php?action=registration">Inscrivez-vous</a></p>
        </form>
    </div>
    <div class="registration-picture">
        <img src="./images/RegistrationPicture.png" alt="">
    </div>
</section>