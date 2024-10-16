<?php
    /**
     * Display registration form
     * 
     */
?>

<section class="book">
    <div class="book-go-back">
        <a href="index.php?action=gallery">Nos livres</a> ><?= $book->getTitle() ?>
    </div>
    <div class="book-presentation">
        <div class="book-picture">
            <img src="./images/<?= $book->getImage() ?>" alt="">
        </div>
        <div class="book-text">
            <div class="book-title-author">
                <h1><?= $book->getTitle() ?></h1>
                <p>par <?= $book->getAuthor() ?></p>
            </div>
            <p>___</p>
            <h3>DESCRIPTION</h3>
            <div class="book-description">
                <p><?= $book->getDescription() ?></p>
            </div>
            <h3>PROPRIETAIRE</h3>    
            <a href="index.php?action=userprofil&id=<?=$book->getIdUser()?>">
                <div class="book-owner">
                    <img src="./images/<?= $book->getAvatarUrl() ?>" alt="">
                    <p><?= $book->getPseudo() ?></p>
                </div>
            </a>
            <div class=div-link-button>
                <a class="link-button" href="index.php?action=messaging&id=<?= $book->getIdUser() ?>">Envoyer un message</a>
            </div>
        </div>
    </div>



</div>

</section>