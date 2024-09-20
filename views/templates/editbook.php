<?php
    /**
     * Display registration form
     * 
     */
?>

<section class="editbook">
    <a href=""><- retour</a>
    <h1>Modifier les informations</h1>
    <div class="editbook-picture">
        <p>Photo</p> 
        <img src="./images/<?= $book->getImage() ?>" alt="">
        <a href="">Modifier la photo</a>
    </div>
    <div class="editbook-forms">
        
        <p>Titre</p>
        <form class="registration-form" method="get" action="#">
        <input class="book-search" type="text" name="pseudo" id="" size="30" maxlength="120" placeholder="<?= $book->getTitle() ?>">
        <p>Auteur</p>
        <form class="registration-form" method="get" action="#">
        <input class="book-search" type="text" name="email" id="" size="30" maxlength="120" placeholder="<?= $book->getAuthor() ?>">
        <p>Commentaire</p>
        <form class="registration-form" method="get" action="#">
        <input class="book-search" type="text" name="password" id="" size="30" maxlength="120" placeholder="<?= $book->getDescription() ?>">
        <p>Disponibilité</p>
        <form class="registration-form" method="get" action="#">
        <input class="book-search" type="text" name="password" id="" size="30" maxlength="120" placeholder="<?= $book->getStatus() ?>">

        <input class="registrate-button" type="submit" value="Valider">

        </form>
    </div>



</div>

</section>