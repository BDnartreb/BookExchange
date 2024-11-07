<?php
    /**
     * Display book page
     * 
     */
?>

<section class="book" role="region" aria-label="page de présentation d'un livre">
    <div class="book-go-back">
        <a href="index.php?action=gallery" alt="lien vers la page précédente">Nos livres</a> ><?= $book->getTitle() ?>
    </div>
    <div class="book-presentation" aria-label="zone de présentation du livre">
        <div class="book-picture">
            <img src="./images/<?= $book->getImage() ?>" alt="image du livre">
        </div>
        <div class="book-text">
            <div class="book-title-author" aria-label="titre et auteur">
                <h1><?= $book->getTitle() ?></h1>
                <p>par <?= $book->getAuthor() ?></p>
            </div>
            <p>___</p>
            <h3>DESCRIPTION</h3>
            <div class="book-description" aria-label="description du livre">
                <p><?= $book->getDescription() ?></p>
            </div>
            <h3>PROPRIETAIRE</h3>    
            <a href="index.php?action=userprofil&id=<?=$book->getIdUser()?>" alt="lien vers la page de profil du propriétaire du livre">
                <div class="book-owner" aria-label="avatar et pseudo du propriétaire du livre">
                    <img src="./images/<?= $book->getAvatarUrl() ?>" alt="">
                    <p><?= $book->getPseudo() ?></p>
                </div>
            </a>
            <div class=div-link-button aria-label="lien pour envoyer un message au propriétaire du livre">
                <a class="link-button" href="index.php?action=messaging&contactid=<?= $book->getIdUser() ?>" alt="lien pour envoyer un message au propriétaire du livre">Envoyer un message</a>
            </div>
        </div>
    </div>
</section>