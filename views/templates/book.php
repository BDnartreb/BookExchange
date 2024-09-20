<?php
    /**
     * Display registration form
     * 
     */
?>

<section class="book">
    <a href="">Nos livres</a><p> > <?= $book->getTitle() ?></p>
    <div class="book-picture">
        <img src="<?= $book->getImage() ?>" alt="">
    </div>
    <div class="book-text">
        <div>
            <h1><?= $book->getTitle() ?></h1>
            <p><?= $book->getAuthor() ?></p>
            <p>___</p>
            <h2>DESCRIPTION</h2>
            <p><?= $book->getDescription() ?></p>
            <h2>PROPRIETAIRE</h2>
        </div>    
        <div>
            <img src="./images/<?= $book->getAvatarUrl() ?>">
            <p><?= $book->getPseudo() ?></p>
        </div>
    </div>



</div>

</section>